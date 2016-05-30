<?php

class UjianController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('mulai','simpan', 'cek'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'status', 'nilai', 'detil_nilai', 'detil_entri'),
				'expression'=>array('Controller', 'harus_admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionMulai()
        {
            $ujian = Ujian::model()->findByPk(1);
            if($ujian->status == '0'):
                $this->render('belum_mulai');
            else:
            
            $ip = '192.168.1.36';
            $pecah = explode(".", $ip);
            $versi = ($pecah[count($pecah)-1]%2)+1;
            
            //$model = Question::model()->findAll("versi='".$versi."'");
            
            if(Yii::app()->user->level_id == '2' && !User::model()->hasSoal(Yii::app()->user->id)):
                $criteria = new CDbCriteria();
                $criteria->condition = "versi='".$versi."'";
                $criteria->order = "jenis_pertanyaan ASC";
                $model = Question::model()->findAll($criteria);
                foreach($model as $data) {
                    $usersanswers = new UsersAnswers;
                    $usersanswers->question_id = $data->id;
                    $usersanswers->user_id = Yii::app()->user->id;
                    $usersanswers->save();
                }
            endif;
            
            $models = array();
            
            for($i=0;$i<4;$i++) {
                $criteria = new CDbCriteria();
                $criteria->join = "INNER JOIN questions ON t.question_id=questions.id";
                $criteria->condition = "questions.jenis_pertanyaan=".($i+1)." AND user_id=".Yii::app()->user->id;
                $models[$i] = UsersAnswers::model()->findAll($criteria);
            }
            $this->render('index', compact('models'));
            
            endif;
        }
        
        public function actionSimpan() {
            if(Yii::app()->request->isAjaxRequest){
                //sleep(1);
                $jawaban = $_POST['q'];
                foreach($jawaban as $key => $value) {
                    //echo $key;
                    $model = UsersAnswers::model()->findByPk($key);
                    $model->answer = $value;
                    $model->save();
                }
            }
        }
        
        public function actionAdmin() {
            $ujian = Ujian::model()->findByPk(1);
            $entri = Ujian::model()->findByPk(3);
            $this->render('admin', compact('ujian','entri'));
        }
        
        public function actionStatus($jenis) {
            
            if($jenis == 1) {
                $ujian = Ujian::model()->findByPk(1);
                if($ujian->status == '0')
                    $ujian->status = '1';
                else {
                    $ujian->status = '0';
                    
                }
                $ujian->save();
            }
            
            if($jenis == 2) {
                $entri = Ujian::model()->findByPk(3);
                if($entri->status == '0')
                    $entri->status = '1';
                else {
                    $entri->status = '0';
                    EntriTimer::model()->saveAll();
                }
                $entri->save();
            }
            $this->redirect(array("ujian/admin"));
        }
        
        public function actionCek() {
            $ujian = Ujian::model()->findByPk(1);
            echo $ujian->status;
        }
        
        public function actionNilai() {
            $model = Yii::app()->db->createCommand
                        ('
                            SELECT 
                                u.id, 
                                u.kode, 
                                u.nama, 
                                u.username, 
                                u.level_id,
                                y.jum_betul,
                                x.jum_entribetul
                            FROM 
                                public.users as u 
                                LEFT JOIN 
                                (
                                    SELECT 
                                        u.id,
                                        SUM(CASE WHEN ua.answer=q.flag_answer THEN 1 ELSE 0 END) as jum_betul
                                    FROM
                                        users as u,
                                        users_answers as ua,
                                        questions as q
                                    WHERE
                                        u.id = ua.user_id AND ua.question_id=q.id
                                    GROUP BY
                                        u.id
                                ) as y ON y.id=u.id
                                LEFT JOIN
                                (
                                    SELECT 
                                        u.id,
                                        SUM(CASE WHEN ue.b4k2=e.b4k2 THEN 1 ELSE 0 END + CASE WHEN ue.b4k3=e.b4k3 THEN 1 ELSE 0 END + CASE WHEN ue.b4k5=e.b4k5 THEN 1 ELSE 0 END) as jum_entribetul
                                    FROM
                                        users as u,
                                        users_entries as ue,
                                        entri as e
                                    WHERE
                                        u.id = ue.user_id AND ue.entri_id=e.id
                                    GROUP BY
                                        u.id
                                ) as x ON x.id=u.id
                            WHERE
                                u.level_id=2
                            ORDER BY
                                jum_betul, jum_entribetul DESC
                        ')
                        ->queryAll();
            $this->render('nilai', compact('model'));
        }
        
        public function actionDetil_nilai($id) {
            $model = Yii::app()->db->createCommand
                        ("
                            SELECT 
                                b.question, 
                                b.flag_answer,
                                c.answer,
                                CASE 
                                    WHEN b.flag_answer='a' THEN b.option_a
                                    WHEN b.flag_answer='b' THEN b.option_b
                                    WHEN b.flag_answer='c' THEN b.option_c
                                    WHEN b.flag_answer='d' THEN b.option_d
                                    WHEN b.flag_answer='e' THEN b.option_e
                                    ELSE 'Other'
                                END as jawaban_benar,
                                CASE 
                                    WHEN c.answer='a' THEN b.option_a
                                    WHEN c.answer='b' THEN b.option_b
                                    WHEN c.answer='c' THEN b.option_c
                                    WHEN c.answer='d' THEN b.option_d
                                    WHEN c.answer='e' THEN b.option_e
                                    ELSE 'Other'
                                END as jawaban_peserta
                              FROM 
                                users_answers c, 
                                users a, 
                                questions b
                              WHERE 
                                c.user_id = ".$id." AND
                                c.question_id = b.id AND
                                c.user_id = a.id                              
                              ORDER BY
                                b.id
                        ")
                        ->queryAll();
            $this->render('detil_nilai', compact('model'));
        }
        
        public function actionDetil_entri($id) {
            $model = Yii::app()->db->createCommand
                        ("
                            SELECT 
                                e.b4k2,
                                ue.b4k2 as s_b4k2,
                                e.b4k3,
                                ue.b4k3 as s_b4k3,
                                e.b4k5,
                                ue.b4k5 as s_b4k5
                            FROM 
                                users u, 
                                users_entries ue, 
                                entri e
                            WHERE 
                                ue.entri_id = e.id AND
                                ue.user_id = u.id AND u.id=".$id."
                        ")
                        ->queryAll();
            $this->render('detil_entri', compact('model'));
        }
	
}

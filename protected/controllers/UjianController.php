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
				'actions'=>array('mulai','simpan'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin', 'status', 'nilai'),
				'expression'=>array('Controller', 'harus_admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionMulai()
        {
            $ip = '192.168.1.36';
            $pecah = explode(".", $ip);
            $versi = ($pecah[count($pecah)-1]%2)+1;
            
            //$model = Question::model()->findAll("versi='".$versi."'");
            
            if(Yii::app()->user->level_id == '2' && !User::model()->hasSoal(Yii::app()->user->id)):
                $model = Question::model()->findAll("versi='".$versi."'");
                foreach($model as $data) {
                    $usersanswers = new UsersAnswers;
                    $usersanswers->question_id = $data->id;
                    $usersanswers->user_id = Yii::app()->user->id;
                    $usersanswers->save();
                }
            endif;
            $model = UsersAnswers::model()->findAll("user_id=".Yii::app()->user->id);
            $this->render('index', compact('model'));
        }
        
        public function actionSimpan() {
            if(Yii::app()->request->isAjaxRequest){
                //sleep(2);
                $jawaban = $_POST['q'];
                //echo 'sdsd';exit;
                foreach($jawaban as $key => $value) {
                    echo $key;
                    $model = UsersAnswers::model()->findByPk($key);
                    $model->answer = $value;
                    $model->save();
                    echo $model->answer;
                }
            }
        }
        
        public function actionAdmin() {
            $ujian = Ujian::model()->findByPk(1);
            $this->render('admin', compact('ujian'));
        }
        
        public function actionStatus() {
            $ujian = Ujian::model()->findByPk(1);
            if($ujian->status == '0')
                $ujian->status = '1';
            else
                $ujian->status = '0';
            $ujian->save();
            $this->redirect(array("ujian/admin"));
        }
        
        public function actionNilai() {
            $model = Yii::app()->db->createCommand()
                        ->setText('SELECT 
                                    u.id, 
                                    u.kode, 
                                    u.nama, 
                                    u.username, 
                                    u.level_id,
                                    q.versi,
                                    SUM(CASE WHEN ua.answer=q.flag_answer THEN 1 ELSE 0 END) as jum_betul
                                FROM 
                                    public.users as u LEFT JOIN public.users_answers as ua ON u.id=ua.user_id LEFT JOIN questions q ON q.id=ua.question_id
                                WHERE
                                    u.level_id=2
                                GROUP BY
                                    u.id,
                                    u.kode,
                                    u.nama,
                                    u.username,
                                    u.level_id,q.versi
                                ORDER BY
                                    jum_betul DESC
                                ')
                        ->queryAll();
            //print_r($model);exit;
            $this->render('nilai', compact('model'));
        }
	
}

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
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
                
            //Yii::app()->end;
        }
	
}

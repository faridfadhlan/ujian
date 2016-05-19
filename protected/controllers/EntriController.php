<?php

class EntriController extends Controller
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
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','ujianentri','simpan'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=>array('Controller', 'harus_admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Entri;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Entri']))
		{
			$model->attributes=$_POST['Entri'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Entri']))
		{
			$model->attributes=$_POST['Entri'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Entri');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
//		$model=new Entri('search');
//		$model->unsetAttributes();  
//		if(isset($_GET['Entri']))
//			$model->attributes=$_GET['Entri'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
            $dataProvider = Entri::model()->findAll();
            $this->render('admin',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Entri the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Entri::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Entri $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='entri-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionUjianentri() {
            $ujian = Ujian::model()->findByPk(3);
            if($ujian->status == '0' || !User::model()->isBuka(Yii::app()->user->id)):
                $this->render('belum_mulai');
            else:
                
            
            if  (
                    Yii::app()->user->level_id == '2' && 
                    !User::model()->hasEntri(Yii::app()->user->id)
                ):
                $model = Entri::model()->findAll();
                foreach($model as $data) {
                    $usersentries = new UsersEntries;
                    $usersentries->entri_id = $data->id;
                    $usersentries->user_id = Yii::app()->user->id;
                    $usersentries->save();
                }
                
                $timer = new EntriTimer;
                $timer->user_id = Yii::app()->user->id;
                $timer->waktu_mulai = date("H:i:s");
                $timer->save(false);
                
            endif;
            
            $mulai = EntriTimer::model()->find("user_id=:user_id", array(":user_id"=>Yii::app()->user->id));
            
            $durasi = time() - strtotime($mulai->waktu_mulai);
            
            $soals = UsersEntries::model()->findAll("user_id=:user_id", array(":user_id"=>Yii::app()->user->id));
            $this->render("ujianentri", compact('soals', 'durasi'));
            endif;
        }
        
        public function actionSimpan() {
            if(Yii::app()->request->isAjaxRequest){
                //sleep(1);
                $jawaban = $_POST['q'];
                //print_r($jawaban);exit;
                
                foreach($jawaban as $key => $value) {
                    $model = UsersEntries::model()->findByPk($key);
                    $model->entri = $value;
                    $model->save();
                }
                $timer = EntriTimer::model()->find("user_id=:user_id", array(":user_id"=>Yii::app()->user->id));
                $timer->waktu_selesai = date("H:i:s",time());
                $timer->save();
            }
        }
}

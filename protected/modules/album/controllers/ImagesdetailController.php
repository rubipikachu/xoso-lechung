<?php

class ImagesdetailController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','create','update','admin','delete'),
				'expression'=>CommonHelper::getpermission('images'),
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
		$model=new Imagesdetail;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Imagesdetail']))
		{
			$model->attributes=$_POST['Imagesdetail'];
			$imagelist=CUploadedFile::getInstancesByName('image');
            if(isset($imagelist) && count($imagelist) > 0){
                $folder = 'upload/'.date('Ymd');
                if(!file_exists($folder)){
                    mkdir($folder);
                }
                foreach ($imagelist as $image => $pic) {
                    $time = time();
                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/'.$folder.'/'.$time.$pic->name)){
                          $imageitem = new Imagesdetail;
                          $imageitem->image = $folder.'/'.$time.$pic;
                          $imageitem->name = $pic->name;
                          $imageitem->albumid = $model->albumid;
                          $imageitem->status = 1;
                          $imageitem->create = time();
                          $imageitem->insert();
                    } 
                }
                $this->redirect(array('admin'));
            }else{
                $model->attributes=$_POST['Imagesdetail'];
                if($model->save()){
                        //$model->image->saveAs($folder.'/'.$model->image);
    //                    $model->image = $folder.'/'.$model->image;
    //                    $model->update(array('image'));
        				$this->redirect(array('view','id'=>$model->id));
                }
            }
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

		if(isset($_POST['Imagesdetail']))
		{
			$oldimage = $model->image;
            $model->attributes=$_POST['Imagesdetail'];
            $model->image=CUploadedFile::getInstance($model,'image');
            if($model->image != NULL){
                $folder = 'upload/'.date('Ymd');
                if(!file_exists($folder)){
                    mkdir($folder);
                }
                $time = time();
                $model->image->saveAs(Yii::getPathOfAlias('webroot').'/'.$folder.'/'.$time.$model->image);
                $model->image = $folder.'/'.$time.$model->image;
            }else{
                $model->image = $oldimage;
            }
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
		$dataProvider=new CActiveDataProvider('Imagesdetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Imagesdetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Imagesdetail']))
			$model->attributes=$_GET['Imagesdetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Imagesdetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Imagesdetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Imagesdetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='imagesdetail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

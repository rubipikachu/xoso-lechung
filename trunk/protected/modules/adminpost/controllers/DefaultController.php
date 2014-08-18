<?php

class DefaultController extends AdminController
{
	public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    
    public function accessRules() {
        $controller = get_class($this);
        $isAllowPermission = CommonHelper::isAllowPermission(Yii::app()->user->id, $this->module->id, $controller, $this->action->id);
        return array(
                array('allow', 
                    'actions' => array('view','create','update','delete','index'),
                    'expression'=>"$isAllowPermission",
                ),
                
                array('deny', // deny all users
                    'users' => array('*'),
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
		$model=new Content;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Content']))
		{
			$model->attributes=$_POST['Content'];
            $model->images=CUploadedFile::getInstance($model,'images');
            $model->created = time();
            $model->modified = time();
			if($model->save()){
                $folder = 'upload/'.date('Ymd');
                if(!file_exists($folder)){
                    mkdir($folder);
                }
                $model->images->saveAs($folder.'/'.$model->images);
                $model->images = $folder.'/'.$model->images;
                $model->update(array('images'));
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Content']))
		{
			$oldimage = $model->images;
            $model->attributes=$_POST['Content'];
            $model->modified = time();
            $model->images=CUploadedFile::getInstance($model,'images');
            if($model->images != NULL){
                $folder = 'upload/'.date('Ymd');
                if(!file_exists($folder)){
                    mkdir($folder);
                }
                $model->images->saveAs($folder.'/'.$model->images);
                $model->images = $folder.'/'.$model->images;
            }else{
                $model->images = $oldimage;
            }
            //var_dump($model->images); exit;
			if($model->save())
            {
                $this->redirect(array('view','id'=>$model->id));
            }
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
			$this->redirect(array('index'));
	}
    
	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$data = Content::model()->findAll();
        $this->render('index', array( 'model' => $data));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Content the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Content::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Content $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
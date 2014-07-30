<?php

class KqxsNamController extends AdminController
{
	
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
		$model=new KqxsNam;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $model->image=CUploadedFile::getInstance($model,'image');
		if(isset($_POST['KqxsNam']))
		{
			$model->attributes=$_POST['KqxsNam'];
			if($model->save()){
                $folder = 'upload/'.date('Ymd');
                if(!file_exists($folder)){
                    mkdir($folder);
                }
                $model->image->saveAs($folder.'/'.$model->image);
                $model->image = $folder.'/'.$model->image;
                $model->update(array('image'));
				$this->redirect(array('view','id'=>$model->id));
            }
		}
        $model->date = date("d-m-Y",time());
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

		if(isset($_POST['KqxsNam']))
		{
            $oldimage = $model->image;
            $model->attributes=$_POST['KqxsNam'];
            $model->image=CUploadedFile::getInstance($model,'image');
            if($model->image != NULL){
                $folder = 'upload/'.date('Ymd');
                if(!file_exists($folder)){
                    mkdir($folder);
                }
                $model->image->saveAs($folder.'/'.$model->image);
                $model->image = $folder.'/'.$model->image;
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
			$this->redirect(array('/kqxs'));
	}

	public function actionIndex()
	{
		$data = KqxsNam::model()->findAll();
        $this->render('index', array( 'model' => $data));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new KqxsNam('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['KqxsNam']))
			$model->attributes=$_GET['KqxsNam'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return KqxsNam the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=KqxsNam::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param KqxsNam $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kqxs-nam-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class KqxsTrungController extends AdminController
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
		$model=new KqxsTrung;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $model->image=CUploadedFile::getInstance($model,'image');
		if(isset($_POST['KqxsTrung']))
		{
			$model->attributes=$_POST['KqxsTrung'];
            $kqxs = KqxsBac::model()->find("date=:date and provice=:provice",array(':date'=>$model->date,":provice"=>$model->provice));
			if(!$kqxs && $model->save()){
                $folder = 'upload/'.date('Ymd');
                if(!file_exists($folder)){
                    mkdir($folder);
                }
                if (is_object($model->image)){
                    $model->image->saveAs(Yii::getPathOfAlias('webroot').'/'.$folder.'/'.$model->image);
                }
                $model->image = $folder.'/'.$model->image;
                $model->update(array('image'));
				$this->redirect(array('view','id'=>$model->id));
            }else{
                $model->addError('date','Kết quả này đã có vui lòng chỉnh lại thông tin');
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

		if(isset($_POST['KqxsTrung']))
		{
            $oldimage = $model->image;
            $model->attributes=$_POST['KqxsTrung'];
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
		$data = KqxsTrung::model()->findAll('1=1 order by id desc');
        $this->render('index', array( 'model' => $data));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new KqxsTrung('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['KqxsTrung']))
			$model->attributes=$_GET['KqxsTrung'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return KqxsTrung the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=KqxsTrung::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param KqxsTrung $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='kqxs-trung-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

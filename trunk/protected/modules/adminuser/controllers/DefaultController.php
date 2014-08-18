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
                    'actions' => array('index','login', 'logout', 'viewuser', 'adduser', 'updateuser', 'deleteuser', 'grandpermission', 'permission', 'viewpermission', 'createpermission', 'updatepermission'),
                    'expression'=>"$isAllowPermission",
                ),
                
                array('deny', // deny all users
                    'users' => array('*'),
                ),
        );
    }
    
    public function actionIndex()
	{
		$data = Users::model()->findAll();
        $this->render('index', array( 'model' => $data));
	}
    
    
    public function actionLogin()
    {
        $this->layout = "none";
        if (!Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->homeUrl);
        }

        $model = new LoginForm('Back');
        
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm']; 
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $return = (Yii::app()->user->returnUrl == '/') ? '/admincp' : Yii::app()->user->returnUrl;
                $this->redirect($return);
            }            
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }
    
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(array("/adminuser/default/login"));
    }
    
    
    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionViewuser($id)
	{
		$this->render('viewuser',array(
			'model'=>$this->loadModeluser($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionAdduser()
	{
		$model=new Users;

		$this->performAjaxValidationuser($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
            $model->password    = Users::getcryptedpassword($model->password);
            $model->created     = time();
			if($model->save())
				$this->redirect("/adminuser");
		}

		$this->render('createuser',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateuser($id)
	{
		$model=$this->loadModeluser($id);

		$this->performAjaxValidationuser($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect("/adminuser");
		}

		$this->render('updateuser',array(
			'model'=>$model,
		));
	}
    
    public function loadModeluser($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    
    /**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidationuser($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    public function actionGrandpermission($id){
        $model=$this->loadModeluser($id);
        $permission = Permission::model()->findAll();
        $grand      = UserPermissions::model()->findAll("userid = :uid", array(":uid" => $model->id));
        $arr = array();
        foreach($grand as $allow) array_push($arr,$allow->permission_id);
        if(isset($_POST['permission']))
		{
            $collect = $_POST["permission"];
            UserPermissions::model()->deleteAll("userid = :uid", array(":uid" => $model->id));
            foreach($collect as $item){
                $up = new UserPermissions;
                $up->userid         = $model->id;
                $up->permission_id  = $item;
                $up->save();
            }
            $this->redirect("/adminuser");
        }
        $this->render('grandpermission', array( 'model' => $model, 'permission' => $permission, 'grand' => $arr));
    }
    
    public function actionPermission()
	{
		$data = Permission::model()->findAll();
        $this->render('permission', array( 'model' => $data));
	}
    
    
    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionViewpermission($id)
	{
		$this->render('viewpermission',array(
			'model'=>$this->loadModelpermission($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreatepermission()
	{
		$model=new Permission;

		$this->performAjaxValidationPermission($model);

		if(isset($_POST['Permission']))
		{
			$model->attributes=$_POST['Permission'];
            $model->created = time();
			if($model->save())
				$this->redirect("/adminuser/default/permission");
		}

		$this->render('createpermission',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdatepermission($id)
	{
		$model=$this->loadModelpermission($id);

		$this->performAjaxValidationPermission($model);

		if(isset($_POST['Permission']))
		{
			$model->attributes=$_POST['Permission'];
			if($model->save())
				$this->redirect("/adminuser/default/permission");
		}

		$this->render('updatepermission',array(
			'model'=>$model,
		));
	}
    
    /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Permission the loaded model
	 * @throws CHttpException
	 */
	public function loadModelpermission($id)
	{
		$model=Permission::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Permission $model the model to be validated
	 */
	protected function performAjaxValidationPermission($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='permission-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
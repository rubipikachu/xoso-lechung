<?php

class DashboardController extends AdminController
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
                    'actions' => array('index'),
                    'expression'=>"$isAllowPermission",
                ),
                
                array('deny', // deny all users
                    'users' => array('*'),
                ),
        );
    }
    
    public function actionIndex()
	{
        $this->render('index');
	}
}
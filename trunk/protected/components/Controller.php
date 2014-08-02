<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 * @package Web.Controller
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to 'column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    protected function beforeAction($action) {
        
        $language = Yii::app()->session['language'];
        $lang = ($language=='vi')?1:2;
        
        if(isset($language) && in_array($language, Yii::app()->params['supportLanguage'])) 
        {
            Yii::app()->language = $language;
        } else
        {
            if (Yii::app()->user->isGuest){
                Yii::app()->language = 'vi';
            }else
            {
                //select user language
            }    
        }
        return parent::beforeAction($action);
    }

    /**
     * Return data to browser as JSON
     * @param array $data
     */
    protected function renderJSON($data)
    {
        header('Content-type: application/json');
        echo CJSON::encode($data);
     
        Yii::app()->end();
    }

    private $_csrfToken;
 
    public function getToken()
    {
        if($this->_csrfToken===null)
        {
            $session = Yii::app()->session;
            $csrfToken=$session->itemAt('APP_TOKEN');
            if($csrfToken===null)
            {
                $csrfToken = sha1(uniqid(mt_rand(),true));
                $session->add('APP_TOKEN', $csrfToken);
            }
            $this->_csrfToken = $csrfToken;
        }
     
        return $this->_csrfToken;
    }

    public function validateToken($token)
    {
        if(Yii::app()->request->isPostRequest)
        {
            // only validate POST requests
            $session=Yii::app()->session;
            if($session->contains('APP_TOKEN'))
            {
                $tokenFromSession=$session->itemAt('APP_TOKEN');
                $valid=$tokenFromSession===$token;
            }
            else
                $valid=false;
            if(!$valid)
                throw new CHttpException(400,'The CSRF token could not be verified.');
        }
    }
}

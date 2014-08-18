<?php
/**
 * Extending CWebUser to add some most common function of Fshare User
 * @package FshareWeb
 **/
class AppUser extends CWebUser
{
    private $_model;    
    public $allowAutoLogin=true;
    public function getModel()
    {
        return $this->loadModel();
    }

    protected function loadModel($id=null)
    {
        if($this->_model===null) {
            if($id===null) {
                $this->_model=User::model()->findByPk($this->id);
            }
        }
        return $this->_model;
    }

    public function __get($name)
    {
        if ($this->hasState('__userInfo')) {
            $user=$this->getState('__userInfo',array());
            if (isset($user[$name])) {
                return $user[$name];
            }
        }
        return parent::__get($name);
    }
 
    public function login($identity, $duration = 0) {
        $this->setState('__userInfo', $identity->getUser());
        parent::login($identity, $duration);
    }

}
?>

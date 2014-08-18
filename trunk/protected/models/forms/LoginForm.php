<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data.
 */
class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe;
    public $userType; // added new member
 
    private $_identity;
 
    public function __construct($arg='Front') { // default it is set to Front     
        $this->userType = $arg;
    }
    
    /**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
            array('username', 'required', 'message'=>Yii::t('site', 'username should not be empty!')),
            array('password', 'authenticate'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>Yii::t('site','Remember me'),
		);
	}
    
    public function authenticate($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $this->_identity=new UserIdentity($this->username,$this->password);
            $this->_identity->userType = $this->userType; // this will pass flag to the UserIdentity class
            if(!$this->_identity->authenticate())
                $this->addError('password','Incorrect username or password.');
        }
    }

    public function login()
	{
		$FWebUser = new AppUser;
        if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            $FWebUser->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
    
    
    
}

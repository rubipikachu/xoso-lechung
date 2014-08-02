<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    
    protected $_id;
    public $user;
    const ERROR_NOT_AUTHENTICATED = 3;
    public $userType = 'Front';

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
    {
        if($this->userType=='Front') // This is front login
        {
            
            $record = Users::model()->findByAttributes(array('username'=>$this->username)); 
            if($record===null)
            { 
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            }
            else if(!$record->validatePassword($this->password))
            { 
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
            else
            {  
                $this->setUser($record);
                $this->errorCode=self::ERROR_NONE;
            }
            return !$this->errorCode;
        }
        if($this->userType=='Back')// This is admin login
        {
           
            $record = Users::model()->findByAttributes(array('username'=>$this->username, 'level'=>2));
            if($record===null)
            { 
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            }
            else if(!$record->validatePassword($this->password))
            { 
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
            else
            {  
                $this->setState('isAdmin',1);
                $this->setUser($record);
                $this->errorCode=self::ERROR_NONE;
            }
            return !$this->errorCode;
        }
    }

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(CActiveRecord $user)
    {
        $this->user=$user->attributes;
    }
    
}

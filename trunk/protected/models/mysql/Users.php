<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property integer $level
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property string $email
 * @property string $address
 * @property string $phone
 * @property integer $sex
 * @property string $created
 * @property string $lastvisit
 * @property string $activation_code
 * @property integer $actived
 * @property string $note
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('level, sex, actived', 'numerical', 'integerOnly'=>true),
			array('username, password, fullname', 'length', 'max'=>255),
			array('email', 'length', 'max'=>200),
			array('phone, activation_code', 'length', 'max'=>50),
			array('created, lastvisit', 'length', 'max'=>20),
			array('address, note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, level, username, password, fullname, email, address, phone, sex, created, lastvisit, activation_code, actived, note', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'level' => 'Loại',
			'username' => 'Tên đăng nhập',
			'password' => 'Mật khẩu',
			'fullname' => 'Họ tên',
			'email' => 'Email',
			'address' => 'Địa chi',
			'phone' => 'Điện thoại',
			'sex' => 'Giới tính',
			'created' => 'Ngày tạo',
			'lastvisit' => 'Lần đăng nhập cuối',
			'activation_code' => 'Activation Code',
			'actived' => 'Kích hoạt',
			'note' => 'Ghi chú',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('lastvisit',$this->lastvisit,true);
		$criteria->compare('activation_code',$this->activation_code,true);
		$criteria->compare('actived',$this->actived);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password)
    {

        return $this->getcryptedpassword($password, $this->password) === $this->password;
    }

    /**
     * Display fullname.
     * @return string fullname
     */
    public function getDisplayName()
    {
        return $this->fistname . ' ' . $this->lastname;
    }

    /**
     * get crypted password.
     * @param string the password
     * @param string salt
     * @return string crypted password
     */
    public static function getcryptedpassword($password, $salt = "")
    { // thuat toan ma hoa pass
        //$password la pass user nhap vao
        if ($salt != "")
        { // giai ma $salt = chuoi pass goc trong database
            $array = explode(":", $salt);
            $salt = $array[1];
            return md5($password . substr($salt, 0, 11)) . ":" . $salt;   //  password user nhap vao da duoc ma hoa, chinh la salt neu nhu user nhap dung
        }
        else
        { // ma hoa
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $salt = substr(str_shuffle($chars), 0, 13);
            //$salt = $this->random_text(13);
            return md5($password . substr($salt, 0, 11)) . ":" . $salt;
        }
    }
}
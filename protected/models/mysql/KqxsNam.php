<?php

/**
 * This is the model class for table "kqxs_nam".
 *
 * The followings are the available columns in table 'kqxs_nam':
 * @property integer $id
 * @property integer $date
 * @property integer $provice
 * @property string $loaive
 * @property string $image
 * @property integer $db
 * @property integer $nhat
 * @property integer $nhi
 * @property integer $ba1
 * @property integer $ba2
 * @property integer $tu1
 * @property integer $tu2
 * @property integer $tu3
 * @property integer $tu4
 * @property integer $tu7
 * @property integer $tu5
 * @property integer $tu6
 * @property integer $nam
 * @property integer $sau1
 * @property integer $sau2
 * @property integer $sau3
 * @property integer $bay
 * @property integer $tam
 */
class KqxsNam extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KqxsNam the static model class
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
		return 'kqxs_nam';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image, loaive, db, nhat, nhi, ba1, ba2, tu1, tu2, tu3, tu4, tu7, tu5, tu6, nam, sau1, sau2, sau3, bay, tam', 'safe'),
			array('date, provice', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, provice, loaive, image, db, nhat, nhi, ba1, ba2, tu1, tu2, tu3, tu4, tu7, tu5, tu6, nam, sau1, sau2, sau3, bay, tam', 'safe', 'on'=>'search'),
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
			'date' => 'Ngày xổ',
			'provice' => 'Tỉnh thành',
            'loaive' => 'Loại vé',
			'image' => 'Hình ảnh',
			'db' => 'Đặc biệt',
			'nhat' => 'Nhất',
			'nhi' => 'Nhì',
			'ba1' => 'Ba 1',
			'ba2' => 'Ba 2',
			'tu1' => 'Tư 1',
			'tu2' => 'Tư 2',
			'tu3' => 'Tư 3',
			'tu4' => 'Tư 4',
			'tu7' => 'Tư 7',
			'tu5' => 'Tư 5',
			'tu6' => 'Tư 6',
			'nam' => 'Năm',
			'sau1' => 'Sáu 1',
			'sau2' => 'Sáu 2',
			'sau3' => 'Sáu 3',
			'bay' => 'Bảy',
			'tam' => 'Tám',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('date',$this->date);
		$criteria->compare('provice',$this->provice);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('db',$this->db);
		$criteria->compare('nhat',$this->nhat);
		$criteria->compare('nhi',$this->nhi);
		$criteria->compare('ba1',$this->ba1);
		$criteria->compare('ba2',$this->ba2);
		$criteria->compare('tu1',$this->tu1);
		$criteria->compare('tu2',$this->tu2);
		$criteria->compare('tu3',$this->tu3);
		$criteria->compare('tu4',$this->tu4);
		$criteria->compare('tu7',$this->tu7);
		$criteria->compare('tu5',$this->tu5);
		$criteria->compare('tu6',$this->tu6);
		$criteria->compare('nam',$this->nam);
		$criteria->compare('sau1',$this->sau1);
		$criteria->compare('sau2',$this->sau2);
		$criteria->compare('sau3',$this->sau3);
		$criteria->compare('bay',$this->bay);
		$criteria->compare('tam',$this->tam);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
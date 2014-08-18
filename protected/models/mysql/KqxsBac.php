<?php

/**
 * This is the model class for table "kqxs_bac".
 *
 * The followings are the available columns in table 'kqxs_bac':
 * @property integer $id
 * @property integer $date
 * @property integer $provice
 * @property string $loaive
 * @property string $image
 * @property integer $db
 * @property integer $nhat
 * @property integer $nhi1
 * @property integer $nhi2
 * @property integer $ba1
 * @property integer $ba2
 * @property integer $ba3
 * @property integer $ba4
 * @property integer $ba5
 * @property integer $ba6
 * @property integer $tu1
 * @property integer $tu2
 * @property integer $tu3
 * @property integer $tu4
 * @property integer $nam1
 * @property integer $nam2
 * @property integer $nam3
 * @property integer $nam4
 * @property integer $nam5
 * @property integer $nam6
 * @property integer $sau1
 * @property integer $sau2
 * @property integer $sau3
 * @property integer $bay1
 * @property integer $bay2
 * @property integer $bay3
 * @property integer $bay4
 */
class KqxsBac extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KqxsBac the static model class
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
		return 'kqxs_bac';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, provice', 'required'),
			array('provice, loaive, db, nhat, nhi1, nhi2, ba1, ba2, ba3, ba4, ba5, ba6, tu1, tu2, tu3, tu4, nam1, nam2, nam3, nam4, nam5, nam6, sau1, sau2, sau3, bay1, bay2, bay3, bay4', 'safe'),
			array('date, image', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, provice, loaive, image, db, nhat, nhi1, nhi2, ba1, ba2, ba3, ba4, ba5, ba6, tu1, tu2, tu3, tu4, nam1, nam2, nam3, nam4, nam5, nam6, sau1, sau2, sau3, bay1, bay2, bay3, bay4', 'safe', 'on'=>'search'),
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
			'db' => 'Đặc Biệt',
			'nhat' => 'Nhất',
			'nhi1' => 'Nhì 1',
			'nhi2' => 'Nhì 2',
			'ba1' => 'Ba 1',
			'ba2' => 'Ba 2',
			'ba3' => 'Ba 3',
			'ba4' => 'Ba 4',
			'ba5' => 'Ba 5',
			'ba6' => 'Ba 6',
			'tu1' => 'Tư 1',
			'tu2' => 'Tư 2',
			'tu3' => 'Tư 3',
			'tu4' => 'Tư 4',
			'nam1' => 'Năm 1',
			'nam2' => 'Năm 2',
			'nam3' => 'Năm 3',
			'nam4' => 'Năm 4',
			'nam5' => 'Năm 5',
			'nam6' => 'Năm 6',
			'sau1' => 'Sáu 1',
			'sau2' => 'Sáu 2',
			'sau3' => 'Sáu 3',
			'bay1' => 'Bảy 1',
			'bay2' => 'Bảy 2',
			'bay3' => 'Bảy 3',
			'bay4' => 'Bảy 4',
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
		$criteria->compare('nhi1',$this->nhi1);
		$criteria->compare('nhi2',$this->nhi2);
		$criteria->compare('ba1',$this->ba1);
		$criteria->compare('ba2',$this->ba2);
		$criteria->compare('ba3',$this->ba3);
		$criteria->compare('ba4',$this->ba4);
		$criteria->compare('ba5',$this->ba5);
		$criteria->compare('ba6',$this->ba6);
		$criteria->compare('tu1',$this->tu1);
		$criteria->compare('tu2',$this->tu2);
		$criteria->compare('tu3',$this->tu3);
		$criteria->compare('tu4',$this->tu4);
		$criteria->compare('nam1',$this->nam1);
		$criteria->compare('nam2',$this->nam2);
		$criteria->compare('nam3',$this->nam3);
		$criteria->compare('nam4',$this->nam4);
		$criteria->compare('nam5',$this->nam5);
		$criteria->compare('nam6',$this->nam6);
		$criteria->compare('sau1',$this->sau1);
		$criteria->compare('sau2',$this->sau2);
		$criteria->compare('sau3',$this->sau3);
		$criteria->compare('bay1',$this->bay1);
		$criteria->compare('bay2',$this->bay2);
		$criteria->compare('bay3',$this->bay3);
		$criteria->compare('bay4',$this->bay4);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property string $id
 * @property string $catid
 * @property string $title
 * @property string $introtext
 * @property string $fulltext
 * @property string $images
 * @property integer $created
 * @property integer $modified
 * @property integer $status
 * @property integer $hot
 * @property integer $new
 * @property integer $countvisited
 * @property integer $ordering
 * @property string $metadesc
 * @property string $metakeyword
 */
class Content extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created, modified, status, hot, new, countvisited, ordering', 'numerical', 'integerOnly'=>true),
			array('catid', 'length', 'max'=>11),
			array('title, images', 'length', 'max'=>255),
			array('introtext, fulltext, metadesc, metakeyword', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, catid, title, introtext, fulltext, images, created, modified, status, hot, new, countvisited, ordering, metadesc, metakeyword', 'safe', 'on'=>'search'),
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
			'catid' => 'Danh mục',
			'title' => 'Tiêu đề',
			'introtext' => 'Mô tả',
			'fulltext' => 'Nội dung',
			'images' => 'Hình ảnh',
			'created' => 'Ngày tạo',
			'modified' => 'Ngày chỉnh sửa',
			'status' => 'Tình trạng',
			'hot' => 'Nổi bật',
			'new' => 'Mới',
			'countvisited' => 'Truy cập',
			'ordering' => 'Sắp xếp',
			'metadesc' => 'Metadesc',
			'metakeyword' => 'Metakeyword',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search($type=1)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('catid',$this->catid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('introtext',$this->introtext,true);
		$criteria->compare('fulltext',$this->fulltext,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('modified',$this->modified);
		$criteria->compare('status',$this->status);
		$criteria->compare('hot',$this->hot);
		$criteria->compare('new',$this->new);
		$criteria->compare('countvisited',$this->countvisited);
		$criteria->compare('ordering',$this->ordering);
		$criteria->compare('metadesc',$this->metadesc,true);
		$criteria->compare('metakeyword',$this->metakeyword,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Content the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

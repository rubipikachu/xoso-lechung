<?php



/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $desc
 * @property integer parentid
 */

class Category extends CActiveRecord

{

	/**

	 * @return string the associated database table name

	 */

	public function tableName()

	{

		return 'category';

	}



	/**

	 * @return array validation rules for model attributes.

	 */

	public function rules()

	{

		// NOTE: you should only define rules for those attributes that

		// will receive user inputs.

		return array(

			array('name, type, desc, parentid', 'required'),

			array('type,parentid', 'numerical', 'integerOnly'=>true),

			array('name', 'length', 'max'=>255),
            
            array('desc','safe'),

			// The following rule is used by search().

			// @todo Please remove those attributes that should not be searched.

			array('id, name, type, desc, parentid', 'safe', 'on'=>'search'),

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

			'name' => 'Tên danh mục',

			'type' => 'Loại',

			'desc' => 'Mô tả',
            
            'parentid'=>'Danh mục cha',

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

	public function search()

	{

		// @todo Please modify the following code to remove attributes that should not be searched.



		$criteria=new CDbCriteria;



		$criteria->compare('id',$this->id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('type',$this->type);

		$criteria->compare('desc',$this->desc,true);



		return new CActiveDataProvider($this, array(

			'criteria'=>$criteria,

		));

	}



	/**

	 * Returns the static model of the specified AR class.

	 * Please note that you should have this exact method in all your CActiveRecord descendants!

	 * @param string $className active record class name.

	 * @return Category the static model class

	 */

	public static function model($className=__CLASS__)

	{

		return parent::model($className);

	}

    

    public static function loadAllData($type=2)

    {

        $criteria=new CDbCriteria;

        $criteria->select='id,name';

        $criteria->condition = "type=".$type;

        $qCat=Category::model()->findAll($criteria);

        $category = array("Chọn danh mục cha");

        foreach($qCat as $p)

        {

                $category[$p->id] = $p->name;

        }

        return $category;

    }

}


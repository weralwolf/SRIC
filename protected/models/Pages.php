<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property string $id
 * @property string $conferences_id
 * @property string $menu_title
 * @property string $order
 * @property string $texts_id
 */
class Pages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pages the static model class
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
		return 'pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conferences_id, menu_title, order, texts_id', 'required'),
			array('conferences_id, order, texts_id', 'length', 'max'=>10),
			array('menu_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, conferences_id, menu_title, order, texts_id', 'safe', 'on'=>'search'),
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
			'conferences' => array(self::BELONGS_TO, 'Conferences', 'conferences_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'conferences_id' => 'Conferences',
			'menu_title' => 'Menu Title',
			'order' => 'Order',
			'texts_id' => 'Texts',
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

		$criteria->compare('conferences_id',$this->conferences_id,true);

		$criteria->compare('menu_title',$this->menu_title,true);

		$criteria->compare('order',$this->order,true);

		$criteria->compare('texts_id',$this->texts_id,true);

		return new CActiveDataProvider('Pages', array(
			'criteria'=>$criteria,
		));
	}
}
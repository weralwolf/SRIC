<?php

/**
 * This is the model class for table "accommodation_places".
 *
 * The followings are the available columns in table 'accommodation_places':
 * @property string $id
 * @property string $conferences_id
 * @property string $title
 * @property string $description
 */
class AccommodationPlaces extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AccommodationPlaces the static model class
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
		return 'accommodation_places';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conferences_id, title, description', 'required'),
			array('conferences_id', 'length', 'max'=>10),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, conferences_id, title, description', 'safe', 'on'=>'search'),
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
			'participants' => array(self::HAS_MANY, 'Participants', 'accommodation_places_id'),
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
			'title' => 'Title',
			'description' => 'Description',
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

		$criteria->compare('title',$this->title,true);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider('AccommodationPlaces', array(
			'criteria'=>$criteria,
		));
	}
}
<?php

/**
 * This is the model class for table "conferences".
 *
 * The followings are the available columns in table 'conferences':
 * @property string $id
 * @property string $description_texts_id
 * @property string $registration_begin
 * @property string $registration_end
 * @property string $thesesis_begin
 * @property string $thesesis_end
 */
class Conferences extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Conferences the static model class
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
		return 'conferences';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description_texts_id, registration_begin, registration_end, thesesis_begin, thesesis_end', 'required'),
			array('description_texts_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description_texts_id, registration_begin, registration_end, thesesis_begin, thesesis_end', 'safe', 'on'=>'search'),
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
			'accommodation_places' => array(self::HAS_MANY, 'AccommodationPlaces', 'conferences_id'),
			'accommodation_places_rooms_types' => array(self::HAS_MANY, 'AccommodationPlacesRoomsTypes', 'conferences_id'),
			'contacts' => array(self::HAS_MANY, 'Contacts', 'conferences_id'),
			'pages' => array(self::HAS_MANY, 'Pages', 'conferences_id'),
			'participants' => array(self::HAS_MANY, 'Participants', 'conferences_id'),
			'reports' => array(self::HAS_MANY, 'Reports', 'conferences_id'),
			'sections' => array(self::HAS_MANY, 'Sections', 'conferences_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'description_texts_id' => 'Description Texts',
			'registration_begin' => 'Registration Begin',
			'registration_end' => 'Registration End',
			'thesesis_begin' => 'Thesesis Begin',
			'thesesis_end' => 'Thesesis End',
		);
	}

	public function currentConference() 
	{
	    Yii::log("models/Confereces::currentConference() is NOT IMPLEMENTED");
	    return 12;
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

		$criteria->compare('description_texts_id',$this->description_texts_id,true);

		$criteria->compare('registration_begin',$this->registration_begin,true);

		$criteria->compare('registration_end',$this->registration_end,true);

		$criteria->compare('thesesis_begin',$this->thesesis_begin,true);

		$criteria->compare('thesesis_end',$this->thesesis_end,true);

		return new CActiveDataProvider('Conferences', array(
			'criteria'=>$criteria,
		));
	}
}
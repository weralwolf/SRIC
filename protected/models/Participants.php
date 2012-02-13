<?php

/**
 * This is the model class for table "participants".
 *
 * The followings are the available columns in table 'participants':
 * @property string $id
 * @property integer $approved
 * @property string $conferences_id
 * @property string $contries_id
 * @property string $cities_id
 * @property string $name
 * @property string $second_name
 * @property string $last_name
 * @property integer $gender
 * @property string $birthdate
 * @property string $organizations_id
 * @property string $post
 * @property string $email
 * @property string $phone
 * @property string $participation_type
 * @property string $report_type
 * @property string $sections_id
 * @property string $accommodation_places_id
 * @property string $accommodation_places_rooms_types_id
 */
class Participants extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Participants the static model class
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
		return 'participants';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conferences_id, contries_id, cities_id, name, second_name, last_name, birthdate, organizations_id, post, email, phone, participation_type, report_type, sections_id, accommodation_places_id, accommodation_places_rooms_types_id', 'required'),
			array('approved, gender', 'numerical', 'integerOnly'=>true),
			array('conferences_id, contries_id, cities_id, organizations_id, sections_id, accommodation_places_id, accommodation_places_rooms_types_id', 'length', 'max'=>10),
			array('name, second_name, last_name, post, email, phone', 'length', 'max'=>255),
			array('participation_type', 'length', 'max'=>8),
			array('report_type', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, approved, conferences_id, contries_id, cities_id, name, second_name, last_name, gender, birthdate, organizations_id, post, email, phone, participation_type, report_type, sections_id, accommodation_places_id, accommodation_places_rooms_types_id', 'safe', 'on'=>'search'),
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
			'accommodation_places_rooms_types' => array(self::BELONGS_TO, 'AccommodationPlacesRoomsTypes', 'accommodation_places_rooms_types_id'),
			'conferences' => array(self::BELONGS_TO, 'Conferences', 'conferences_id'),
			'accommodation_places' => array(self::BELONGS_TO, 'AccommodationPlaces', 'accommodation_places_id'),
			'reports' => array(self::HAS_MANY, 'Reports', 'participants_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'approved' => 'Approved',
			'conferences_id' => 'Conferences',
			'contries_id' => 'Contries',
			'cities_id' => 'Cities',
			'name' => 'Name',
			'second_name' => 'Second Name',
			'last_name' => 'Last Name',
			'gender' => 'Gender',
			'birthdate' => 'Birthdate',
			'organizations_id' => 'Organizations',
			'post' => 'Post',
			'email' => 'Email',
			'phone' => 'Phone',
			'participation_type' => 'Participation Type',
			'report_type' => 'Report Type',
			'sections_id' => 'Sections',
			'accommodation_places_id' => 'Accommodation Places',
			'accommodation_places_rooms_types_id' => 'Accommodation Places Rooms Types',
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
		$criteria->compare('approved',$this->approved);
		$criteria->compare('conferences_id',$this->conferences_id,true);
		$criteria->compare('contries_id',$this->contries_id,true);
		$criteria->compare('cities_id',$this->cities_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('second_name',$this->second_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('organizations_id',$this->organizations_id,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('participation_type',$this->participation_type,true);
		$criteria->compare('report_type',$this->report_type,true);
		$criteria->compare('sections_id',$this->sections_id,true);
		$criteria->compare('accommodation_places_id',$this->accommodation_places_id,true);
		$criteria->compare('accommodation_places_rooms_types_id',$this->accommodation_places_rooms_types_id,true);

		return new CActiveDataProvider('Participants', array(
			'criteria'=>$criteria,
		));
	}
}
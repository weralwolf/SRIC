<?php

/**
 * This is the model class for table "participants".
 *
 * The followings are the available columns in table 'participants':
 * @property string $id
 * @property integer $approved
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
class Participants extends CActiveRecord {
    public $country;
    public $city;
    public $organization;
    public $report;
    public $day;
    public $year;
    public $month;
    /**
     * Returns the static model of the specified AR class.
     * @return Participants the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function daysList() {
        $arr = array();
        for($i = 0; $i < 31; $arr[] = ++$i);
        return $arr;
    }
    
    public static function monthsList() {
        $arr = array();
        for($i = 0; $i < 12; $arr[] = ++$i);
        return $arr;
    }
    
    public static function yearsList() {
        $arr = array();
        for($i = 1900; $i < date('Y'); $arr[] = ++$i);
        return $arr;
    }

    public function beforeValidate() {
        $this->birthdate = $this->day . '-' . $this->month . '-'. $this->year;
        return parent::beforeValidate();
    }
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'participants';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
                array(
                        'contries_id, cities_id, name, second_name,
                        last_name, birthdate, organizations_id, post, email, phone,
                        participation_type, report_type, sections_id',
                        'required'),
                /* , accommodation_places_id, accommodation_places_rooms_types_id */
                array('approved, gender', 'numerical', 'integerOnly' => true),
                array(
                        'conferences_id, contries_id, cities_id, organizations_id,
                        sections_id, accommodation_places_id, accommodation_places_rooms_types_id',
                        'length', 'max' => 10),
                array('name, second_name, last_name, post, email, phone', 'length', 'max' => 255),
                array('participation_type', 'in', 'range' => array('lecturer', 'listner')),
                array('report_type', 'in', 'range' => array('plenary', 'sessional', 'poster')),
                array('email', 'email'),
                array('report', 'file', 'types' => 'pdf, doc, docx'),
                /*
                 array('phone', 'match', 'pattern'=>'/^(\+[0-9]{2}[\s]{0,1}[\-]{0,1}[\s]{0,1}1|0)50[\s]{0,1}[\-]{0,1}[\s]{0,1}[1-9]{1}[0-9]{6}$/',
                         'message'=>'Number format is +NN NNN NN-NN-NNN, with or without spaces and dashes.'),
        */
                array('report_type', 'length', 'max' => 9),
                /*
                 array('birthdate', 'date'),
        */
                array(
                        'id, approved, conferences_id, contries_id, cities_id, name,
                        second_name, last_name, gender, birthdate, organizations_id, post,
                        email, phone, participation_type, report_type, sections_id,
                        accommodation_places_id, accommodation_places_rooms_types_id',
                        'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
                'room_type' => array(self::BELONGS_TO, 'AccommodationPlacesRoomsTypes',
                        'accommodation_places_rooms_types_id'),
                'place' => array(self::BELONGS_TO, 'AccommodationPlaces', 'accommodation_places_id'),
                'reports' => array(self::HAS_MANY, 'Reports', 'participants_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        $m = Yii::app()->messages;
        return array(
                'id' => $m->translate('Participants', 'id'),
                'approved' => $m->translate('Participants', 'approved'),
                'contries_id' => $m->translate('Participants', 'contries_id'),
                'cities_id' => $m->translate('Participants', 'cities_id'),
                'name' => $m->translate('Participants', 'name'),
                'second_name' => $m->translate('Participants', 'second_name'),
                'last_name' => $m->translate('Participants', 'last_name'),
                'gender' => $m->translate('Participants', 'gender'),
                'birthdate' => $m->translate('Participants', 'birthdate'),
                'organizations_id' => $m->translate('Participants', 'organizations_id'),
                'post' => $m->translate('Participants', 'post'),
                'email' => $m->translate('Participants', 'email'),
                'phone' => $m->translate('Participants', 'phone'),
                'participation_type' => $m->translate('Participants', 'participation_type'),
                'report_type' => $m->translate('Participants', 'report_type'),
                'sections_id' => $m->translate('Participants', 'sections_id'),
                'accommodation_places_id' => $m->translate('Participants', 'accommodation_places_id'),
                'accommodation_places_rooms_types_id' => $m->translate('Participants', 'accommodation_places_rooms_types_id'
                ),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('approved', $this->approved);
        $criteria->compare('contries_id', $this->contries_id, true);
        $criteria->compare('cities_id', $this->cities_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('second_name', $this->second_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('gender', $this->gender);
        $criteria->compare('birthdate', $this->birthdate, true);
        $criteria->compare('organizations_id', $this->organizations_id, true);
        $criteria->compare('post', $this->post, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('participation_type', $this->participation_type, true);
        $criteria->compare('report_type', $this->report_type, true);
        $criteria->compare('sections_id', $this->sections_id, true);
        $criteria->compare('accommodation_places_id', $this->accommodation_places_id, true);
        $criteria->compare('accommodation_places_rooms_types_id', $this->accommodation_places_rooms_types_id, true);

        return new CActiveDataProvider('Participants', array(
                'criteria' => $criteria,
        ));
    }
}

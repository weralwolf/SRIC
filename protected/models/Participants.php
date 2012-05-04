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
 * @property string $email
 * @property string $phone
 * @property string $participation_type
 * @property string $report_type
 * @property string $accommodation_places_id
 * @property string $accommodation_places_rooms_types_id
 */
class Participants extends CActiveRecord {
    public $country;
    public $city;
    public $organization;
    public $alt_organization;
    public $no_report;
    /**
     * Returns the static model of the specified AR class.
     * @return Participants the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function validateCity($attribute,$params) {
        $this->city = $_POST['cityName'];
        $this->cities_id = Cities::model()->resolveID($this->city, 'Cities');
        if ($this->cities_id == - 1) {
            if (empty($this->city)) {
                $this->addError('cities_id', Yii::app()->dbMessages->translate('Errors', 'select_city'));
                return;
            }
            $message = strtolower(str_replace(array('-', ' '), '_', $this->city));
            $this->cities_id = SourceMessage::createMessage(
                    $message,
                    'Cities',
                    SourceMessage::generateTranslation($this->city),
                    0
            );
        }
    }

    public function validateCountry($attribute,$params) {
        $this->country = $_POST['countryName'];
        $this->contries_id = Countries::model()->resolveID($this->country, 'Countries');
        if ($this->contries_id == - 1) {
            if (empty($this->country)) {
                $this->addError('contries_id', Yii::app()->dbMessages->translate('Errors', 'select_country'));
                return;
            }
            $message = strtolower(str_replace(array('-', ' '), '_', $this->country));
            $this->contries_id = SourceMessage::createMessage(
                    $message,
                    'Countries',
                    SourceMessage::generateTranslation($this->country),
                    0
            );
        }
    }

    public function validateOrganization($attribute,$params) {
        if ($this->organizations_id == -2) {
            $this->addError("organizations_id", Yii::app()->dbMessages->translate('Errors', 'select_organization'));
        }
        
        if (trim($this->alt_organization) == Yii::app()->messages->translate('Participants', 'alt_organization')) {
            $this->addError("organizations_id", Yii::app()->dbMessages->translate('Errors', 'select_organization'));
        }

        $this->alt_organization = $_POST['Participants']['alt_organization'];
        if ($this->organizations_id == -1) {
            if (empty($this->alt_organization)) {
                $this->addError("organizations_id", Yii::app()->dbMessages->translate('Errors', 'select_organization'));
                return;
            }
            
            if (SourceMessage::resolveID($this->alt_organization, 'Organizations') != -1) {
                $this->addError("organizations_id", Yii::app()->dbMessages->translate('Errors', 'organization_exists'));
                return;
            } 
            $message = strtolower(str_replace(array('-', ' '), '_', $this->alt_organization));
            $this->organizations_id = SourceMessage::createMessage(
                    $message,
                    'Organizations_' . Yii::app()->language,
                    SourceMessage::generateTranslation($this->alt_organization),
                    0
            );
        }
    }
    
    public function validateBirthdate($attribute,$params) {
        if ($this->birthdate == 'yyyy-mm-dd') {
            $this->addError('birthdate', Yii::app()->dbMessages->translate('Errors', 'incorrect_data'));
            return;
        }
    	$date = explode('-', $this->birthdate);
    	if (!checkdate($date[1], $date[2], $date[0])) {
    		$this->addError('birthdate', Yii::app()->dbMessages->translate('Errors', 'incorrect_data'));
    	}
    }

    public function validateReport($attribute,$params) {
        if (!is_null($this->no_report)) {
            $this->addError('participation_type', Yii::app()->dbMessages->translate('Errors', 'empty_report'));
        }
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
                array('organizations_id', 'validateOrganization'),
                array('cities_id', 'validateCity'),
                array('contries_id', 'validateCountry'),
                array(
                        'contries_id, cities_id, name,
                        last_name, birthdate, organizations_id, email, phone,
                        participation_type, report_type',
                        'required'),
                /* , accommodation_places_id, accommodation_places_rooms_types_id */
                array('approved, gender', 'numerical', 'integerOnly' => true),
                array(
                        'contries_id, cities_id, organizations_id,
                        accommodation_places_id, accommodation_places_rooms_types_id',
                        'length', 'max' => 10),
                array('name, second_name, last_name, email, phone', 'length', 'max' => 255),
                array('participation_type', 'in', 'range' => array('lecturer', 'listner')),
                array('participation_type', 'validateReport'),
                array('report_type', 'in', 'range' => array('plenary', 'sessional')),
                array('email', 'email'),
                //                 array('report', 'file', 'types' => 'pdf, doc, docx'),
                /*
        array('phone', 'match', 'pattern'=>'/^(\+[0-9]{2}[\s]{0,1}[\-]{0,1}[\s]{0,1}1|0)50[\s]{0,1}[\-]{0,1}[\s]{0,1}[1-9]{1}[0-9]{6}$/',
                'message'=>'Number format is +NN NNN NN-NN-NNN, with or without spaces and dashes.'),
        */
                array('report_type', 'length', 'max' => 9),
                array('birthdate', 'date', 'format' => 'yyyy-mm-dd'),
                array('birthdate', 'validateBirthdate'),
                array(
                        'id, approved, contries_id, cities_id, name,
                        second_name, last_name, gender, birthdate, organizations_id,
                        email, phone, participation_type, report_type,
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
                'accommodation_places_id' => $m->translate('Participants', 'accommodation_places_id'),
                'accommodation_places_rooms_types_id' => $m->translate('Participants', 'accommodation_places_rooms_types_id'),
                'alt_organization' => '',
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
        $criteria->compare('email', $this->email, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('participation_type', $this->participation_type, true);
        $criteria->compare('report_type', $this->report_type, true);
        $criteria->compare('accommodation_places_id', $this->accommodation_places_id, true);
        $criteria->compare('accommodation_places_rooms_types_id', $this->accommodation_places_rooms_types_id, true);

        return new CActiveDataProvider('Participants', array(
                'criteria' => $criteria,
        ));
    }
}

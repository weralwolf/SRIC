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
 * @property integer $need_accomodation
 * @property integer $photo_id
 */
class Participants extends CActiveRecord {
	public $country;
	public $city;
	public $organization;
	public $alt_organization;
	public $no_report;
	public $report;
	public $_reports = array();
	/**
	 * Returns the static model of the specified AR class.
	 * @return Participants the static model class
	*/
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function validateCity($attribute, $params) {
		if (isset($_POST['Participants']['cities_id'])) {
			$this->cities_id = $_POST['Participants']['cities_id'];
			return;
		}
		$this->city = isset($_POST['cityName']) ? $_POST['cityName'] : NULL;
		Yii::log('ParticipantsModel::cityValidate:: resolving id');
		$this->cities_id = Cities::model()->resolveID($this->city, 'Cities');
		if ($this->cities_id == - 1) {
			Yii::log('ParticipantsModel::cityValidate::  id == -1');
			if (empty($this->city)) {
				Yii::log('ParticipantsModel::cityValidate:: city not given');
				$this->addError('cities_id', Yii::app()->dbMessages->translate('Errors', 'select_city'));
				return;
			}
			Yii::log('ParticipantsModel::cityValidate:: creating new city');
			$message = strtolower(str_replace(array('-', ' '), '_', $this->city));
			$this->cities_id = SourceMessage::createMessage($message, 'Cities', SourceMessage::generateTranslation($this
					->city), 0);
		}
	}

	public function reportsButtons() {
		if (!empty($this->reports)) {
			$txt = array();
			foreach ($this->reports as $report) {
				if (!is_null($report)) {
					$txt[] = Yii::app()->controller->renderPartial('application.views.files.button', array(
							'model'     => $report->file,
							'title'     => $report->title,
							'report_id' => $report->id,
					));
				}
			}
			return implode("", $txt);
		} else {
			return 'No reports';
		}
	}

	public function validateCountry($attribute, $params) {
		if (isset($_POST['Participants']['contries_id'])) {
			$this->contries_id = $_POST['Participants']['contries_id'];
			return;
		}
		$this->country = isset($_POST['countryName']) ? $_POST['countryName'] : NULL;
		$this->contries_id = Countries::model()->resolveID($this->country, 'Countries');
		if ($this->contries_id == - 1) {
			Yii::log('ParticipantsModel::countryValidate:: id == -1');
			if (empty($this->country)) {
				Yii::log('ParticipantsModel::countryValidate:: country not given');
				$this->addError('contries_id', Yii::app()->dbMessages->translate('Errors', 'select_country'));
				return;
			}
			Yii::log('ParticipantsModel::countryValidate:: creating new country');
			$message = strtolower(str_replace(array('-', ' '), '_', $this->country));
			$this->contries_id = SourceMessage::createMessage($message, 'Countries', SourceMessage::generateTranslation(
					$this->country), 0);
		}
	}

	public function validateOrganization($attribute, $params) {
		if ($this->organizations_id == - 2) {
			Yii::log('ParticipantsModel::organizationValidate:: id == -2: organization not selected');
			$this->addError("organizations_id", Yii::app()->dbMessages->translate('Errors', 'select_organization'));
		}

		$this->alt_organization = isset($_POST['Participants']['alt_organization']) ? $_POST['Participants'][
		'alt_organization'] : NULL;
		if ($this->organizations_id == - 1) {
			Yii::log('ParticipantsModel::organizationValidate:: id == -1');
			if (trim($this->alt_organization) == Yii::app()->messages->translate('Participants', 'alt_organization')) {
				Yii::log('ParticipantsModel::organizationValidate:: alternative organization hasn\'t been selected');
				$this->addError("organizations_id", Yii::app()->dbMessages->translate('Errors', 'select_organization'));
			}
			if (empty($this->alt_organization)) {
				Yii::log('ParticipantsModel::organizationValidate:: organization not given');
				$this->addError("organizations_id", Yii::app()->dbMessages->translate('Errors', 'select_organization'));
				return;
			}

			if (SourceMessage::resolveID($this->alt_organization, 'Organizations') != - 1) {
				Yii::log('ParticipantsModel::organizationValidate:: given organization already exist');
				$this->addError("organizations_id", Yii::app()->dbMessages->translate('Errors', 'organization_exists'));
				return;
			}

			Yii::log('ParticipantsModel::organizationValidate:: creating new organization');
			$message = strtolower(str_replace(array('-', ' '), '_', $this->alt_organization));
			$this->organizations_id = SourceMessage::createMessage($message, 'Organizations_' . Yii::app()->language,
					SourceMessage::generateTranslation($this->alt_organization), 0);
		}
	}

	public function validateBirthdate($attribute, $params) {
		if ($this->birthdate == 'yyyy-mm-dd') {
			Yii::log('ParticipantsModel::birthdateValidate:: date don\'t given');
			$this->addError('birthdate', Yii::app()->dbMessages->translate('Errors', 'incorrect_data'));
			return;
		}

		$date = explode('-', $this->birthdate);
		if (!checkdate($date[1], $date[2], $date[0])) {
			Yii::log('ParticipantsModel::birthdateValidate:: date do not exist in human history');
			$this->addError('birthdate', Yii::app()->dbMessages->translate('Errors', 'incorrect_data'));
		}
	}

	public function validateReports($attribute, $params) {
		if (!is_null($this->no_report)) {
			Yii::log('ParticipantsModel::reportValidate:: no_report warning something wrong');
			$this->addError('participation_type', Yii::app()->dbMessages->translate('Errors', 'empty_report'));
		}
	}

	public function validatePhoto($attribute, $params) {
		// to be done
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
				// validating location info
				array('organizations_id', 'validateOrganization'),
				array('cities_id', 'validateCity'),
				array('contries_id', 'validateCountry'),

				// required
				array('contries_id, cities_id, name,
						last_name, birthdate, organizations_id, email, phone,
						participation_type', 'required'),

				// booleans & references
				array('approved, gender, need_accomodation',
						'numerical', 'integerOnly' => true),
				array( 'contries_id, cities_id, organizations_id, photo_id',
						'length', 'max' => 10),

				array('name, second_name, last_name, email, phone', 'length', 'max' => 255),

				array('email', 'email'),
				array('birthdate', 'date', 'format' => 'yyyy-mm-dd'),
				array('birthdate', 'validateBirthdate'),

				// participation type verification
				array('participation_type', 'in', 'range' => array('lecturer', 'listner')),
				array('participation_type', 'validateReports'),


				// photo verification
				array('photo_id', 'validatePhoto'),

				//         	array(
				//                 'id, approved, contries_id, cities_id, name,
				//                         second_name, last_name, gender, birthdate, 
				//    		               organizations_id, email, phone, 
				//						   participation_type, need_accomodation',
				//                 'safe', 'on' => 'search'),
		);
	}

	public function resolveSections() {
		$sections = array();
		foreach ($this->reports as $report) {
			$sections[] = Yii::app()->controller->renderPartial('application.views.participants.section', array(
					'text' => $report->section->t(),
			));
		}
		if (empty($sections)) {
			return "---";
		} else {
			return implode(" ", $sections);
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		return array(
				'reports'   => array(self::HAS_MANY, 'Reports', 'participants_id'),
				#            'organization' => array(self::BELONGS_TO, 'Organizations', 'organizations_id'),
				#            'city'         => array(self::BELONGS_TO, 'Cities', 'cities_id'),
				#            'country'      => array(self::BELONGS_TO, 'Countries', 'contries_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		$m = Yii::app()->messages;
		return array(
				'id'                                  => $m->translate('Participants', 'id'),
				'approved'                            => $m->translate('Participants', 'approved'),
				'contries_id'                         => $m->translate('Participants', 'contries_id'),
				'cities_id'                           => $m->translate('Participants', 'cities_id'),
				'name'                                => $m->translate('Participants', 'name'),
				'second_name'                         => $m->translate('Participants', 'second_name'),
				'last_name'                           => $m->translate('Participants', 'last_name'),
				'gender'                              => $m->translate('Participants', 'gender'),
				'birthdate'                           => $m->translate('Participants', 'birthdate'),
				'organizations_id'                    => $m->translate('Participants', 'organizations_id'),
				'post'                                => $m->translate('Participants', 'post'),
				'email'                               => $m->translate('Participants', 'email'),
				'phone'                               => $m->translate('Participants', 'phone'),
				'participation_type'                  => $m->translate('Participants', 'participation_type'),
				'need_accomodation'             => $m->translate('Participants', 'need_accomodation'),
				'alt_organization'                    => '',
				'report'                              => 'Report',
		);
	}

	public function participationState() {
		$state = Yii::app()->dbMessages->translate('Participants', 'participation_type_' . $this->participation_type);
		if ($this->participation_type != 'listner') {
			$state .= ' / ' . Yii::app()->dbMessages->translate('Participants', 'report_type_' . $this->report_type);
		}
		return $state;
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;
		//         $criteria->order = 'categories_id ASC';
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
		$criteria->compare('need_accomodation', $this->need_accomodation, true);
		$criteria->with = array('reports');
		$criteria->together = true;

		return new CActiveDataProvider('Participants', array(
				'criteria'   => $criteria,
				'pagination' => array(
						'pageSize' => 10000,
				),
		));
	}
}

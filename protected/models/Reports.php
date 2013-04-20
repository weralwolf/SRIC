<?php

/**
 * This is the model class for table "reports".
 *
 * The followings are the available columns in table 'reports':
 * @property string $id
 * @property string $participants_id
 * @property string $sections_id
 * @property string $description
 * @property string $title
 * @property string $autors
 * @property string $type
 */
class Reports extends CActiveRecord {
    public $enabled = false;
    /**
     * Returns the static model of the specified AR class.
     * @return Reports the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'reports';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('participants_id, sections_id, description, title, autors, type', 
            		'required'),
            array('participants_id, sections_id', 'length', 'max' => 10),
            array('title', 'length', 'max' => 255),
        	array('type', 'in', 'range' => array('plenary', 'session', 'poster')),
            
        	// The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, participants_id, sections_id, title, autors', 'safe', 'on' => 'search'),
        );
    }
    
    public function types() {
    	$m = Yii::app()->messages;
    	return array(
    			'plenary' => $m->translate('Reports', 'type_plenary'), 
    			'session' => $m->translate('Reports', 'type_session'),
    			'poster' => $m->translate('Reports', 'type_poster'),
    			);
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'participant' => array(self::BELONGS_TO, 'Participants', 'participants_id'),
            'section'     => array(self::BELONGS_TO, 'Sections', 'sections_id'),
        );
    }

    /**
     * Loading model information from POST request
     * @param string $identifier defines subname of report if there few of them
     * @return Reports if anything is going right and there exists enough information, NULL if not enough information
     * 		   or information is absent
     * 
     * public static function saveFromPOST($identifier = '') {
     *   $model = new Reports();

        $reportContainer = ($identifier !== '' ? $_POST['Reports'][$identifier] : $_POST['Reports']);
        $fileContainer = ($identifier !== '' ? $_POST['Files'][$identifier] : $_POST['Files']);

        if (isset($reportContainer) && isset($fileContainer)) {
            $model->attributes = $reportContainer;

            $file = new Files();
            $file->attributes = $fileContainer;
            $file->upload($identifier);
            if ($file->save()) {
                $model->files_id = $file->id;
                return $model;
            } else {
                return NULL;
            }
        }
        return NULL;
    }
    */

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        $m = Yii::app()->messages;
        return array(
            'id'              => $m->translate('Reports', 'id'),
            'participants_id' => $m->translate('Reports', 'participants_id'),
            'sections_id'     => $m->translate('Reports', 'sections_id'),
            'type'        => $m->translate('Reports', 'type'),
            'title'           => $m->translate('Reports', 'title'),
            'autors'          => $m->translate('Reports', 'autors'),
        	'description'          => $m->translate('Reports', 'description'),
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
        $criteria->compare('participants_id', $this->participants_id, true);
        $criteria->compare('sections_id', $this->sections_id, true);
        $criteria->compare('files_id', $this->files_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('autors', $this->autors, true);

        return new CActiveDataProvider('Reports', array(
            'criteria' => $criteria,
        ));
    }
}

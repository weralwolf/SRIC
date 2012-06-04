<?php

/**
 * This is the model class for table "reports".
 *
 * The followings are the available columns in table 'reports':
 * @property string $id
 * @property string $participants_id
 * @property string $sections_id
 * @property integer $files_id
 * @property string $title
 * @property string $autors
 * @property bool $enabled
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
            array('sections_id, title, autors', 'required'),
            array('files_id', 'numerical', 'integerOnly' => true),
            array('participants_id, sections_id', 'length', 'max' => 10),
            array('title', 'length', 'max' => 255),
            array('title', 'validateTitles'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, participants_id, sections_id, files_id, title, autors', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Validator for reports titles, to prevent case when user input is a same as default phrases inside inputs
     * @param string $attribute
     * @param array $params
     */
    public function validateTitles($attribute, $params) {
        Yii::log('ReportModel::titleValidation:: loading `like_in_abstracts` message');
        $sm = SourceMessage::model()->with('messages')->findByAttributes(array(
            'category' => 'Participants',
            'message'  => 'like_in_abstracts'
        ));

        $messages = array();
        foreach ($sm->messages as $m) {
            $messages[] = $m->translation;
        }

        if (in_array($this->title, $messages)) {
            Yii::log('ReportModel:: title is still in default state');
            $this->addError('title', Yii::app()->dbMessages->translate('Errors', 'empty_report'));
        }

        if (in_array($this->autors, $messages)) {
            Yii::log('ReportModel:: authors is still in default state');
            $this->addError('autors', Yii::app()->dbMessages->translate('Errors', 'empty_report'));
        }
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
            'file'        => array(self::BELONGS_TO, 'Files', 'files_id')
        );
    }

    /**
     * Loading model information from POST request
     * @param string $identifier defines subname of report if there few of them
     * @return Reports if anything is going right and there exists enough information, NULL if not enough information
     * 		   or information is absent
     */
    public static function saveFromPOST($identifier = '') {
        $model = new Reports();

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

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        $m = Yii::app()->messages;
        return array(
            'id'              => $m->translate('Reports', 'id'),
            'participants_id' => $m->translate('Reports', 'participants_id'),
            'sections_id'     => $m->translate('Reports', 'sections_id'),
            'files_id'        => $m->translate('Reports', 'files_id'),
            'title'           => $m->translate('Reports', 'title'),
            'autors'          => $m->translate('Reports', 'autors'),
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

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
                array('participants_id, sections_id, title, autors', 'required'),
                array('files_id', 'numerical', 'integerOnly' => true),
                array('participants_id, sections_id', 'length', 'max' => 10),
                array('title', 'length', 'max' => 255),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, participants_id, sections_id, files_id, title, autors', 'safe', 'on' => 'search'),
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
                'section' => array(self::BELONGS_TO, 'Sections', 'sections_id'),
                'file' => array(self::BELONGS_TO, 'Files', 'files_id')
        );
    }

    public static function saveFromPOST($identifier = '') {
        $model = new Reports();
        $dataConteiner = ($identifier !== '' ? $_POST['Reports'][$identifier] : $_POST['Reports']);
        if (isset($dataConteiner) && isset($_POST['Files'][$identifier])) {
            $model->attributes = $dataConteiner;
            if (strcmp($model->title, utf8_encode(Yii::app()->dbMessages->translate('Participants', 'like_in_abstracts'))) || empty($model->title)) {
                return NULL;
            }
            if (strcmp($model->autors, utf8_encode(Yii::app()->dbMessages->translate('Participants', 'like_in_abstracts'))) || empty($model->autors)) {
                return NULL;
            }
            $file = new Files();
            $file->attributes = ($identifier !== '' ? $_POST['Files'][$identifier] : $_POST['Files']);
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
                'id' => $m->translate('Reports', 'id'),
                'participants_id' => $m->translate('Reports', 'participants_id'),
                'sections_id' => $m->translate('Reports', 'sections_id'),
                'files_id' => $m->translate('Reports', 'files_id'),
                'title' => $m->translate('Reports', 'title'),
                'autors' => $m->translate('Reports', 'autors'),
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

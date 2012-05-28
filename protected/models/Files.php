<?php

/**
 * This is the model class for table "files".
 *
 * The followings are the available columns in table 'files':
 * @property string $id
 * @property string $original_name
 * @property string $path
 * @property string $mimetype
 */
class Files extends CActiveRecord {
    private $file;
    private $uploaded = false;
    /**
     * Returns the static model of the specified AR class.
     * @return Files the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'files';
    }

    public function upload($identifier = '') {
        $name = 'Files' . ($identifier !== '' ? "[$identifier]" : '') . '[file]';
        $this->file = CUploadedFile::getInstanceByName($name);
        $this->uploaded = true;
    }

    public function save($runValidation = true, $attributes = NULL) {
        if (is_null($this->file)) {
            $this->addError("file", "File unexist");
            return false;
        }
        $this->original_name = $this->file->name;
        $this->mimetype = $this->file->type;
        $this->path = Yii::app()->basePath . Yii::app()->params['reportsSavePath'] . '/' . date('d.m.Y.H.i.s') . '_' .
                $this->original_name;
        $this->file->saveAs($this->path);
        return parent::save($runValidation, $attributes);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                array('path, mimetype', 'required'),
                array('path, mimetype, original_name', 'length', 'max' => 255),
                //                 array('file', 'file'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, path, mimetype, original_name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => 'Id',
                'orignal_name' => 'Original Name',
                'path' => 'Path',
                'file' => 'File',
                'mimetype' => 'Mimetype',
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

        $criteria->compare('path', $this->path, true);

        $criteria->compare('mimetype', $this->mimetype, true);

        return new CActiveDataProvider('Files', array(
                'criteria' => $criteria,
        ));
    }
}

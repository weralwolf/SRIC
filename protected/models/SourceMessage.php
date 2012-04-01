<?php

/**
 * This is the model class for table "SourceMessage".
 *
 * The followings are the available columns in table 'SourceMessage':
 * @property integer $id
 * @property string $category
 * @property string $message
 */
class SourceMessage extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @return SourceMessage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'SourceMessage';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                array('category', 'length', 'max' => 32),
                array('message', 'safe'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, category, message', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
                'messages' => array(self::HAS_MANY, 'Message', 'id'),
        );
    }

    public static function saveFromPOST($identifier = '') {
        $messagesContainer = $identifier != '' ? $_POST['Message'][$identifier] : $_POST['Message'];
        $model = new SourceMessage;
        $model->attributes = $identifier != '' ? $_POST['SourceMessage'][$identifier] : $_POST['SourceMessage'];
        if ($model->save()) {
            foreach ($messagesContainer as $lang => $data) {
                $message = new Message;
                $message->language = $data['language'];
                $message->translation = $data['translation'];
                $message->id = $model->id;
                $message->save();
            }
            return $model->id;
        }
        return NULL;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => 'Id',
                'category' => 'Category',
                'message' => 'Code shortcut',
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

        $criteria->compare('id', $this->id);

        $criteria->compare('category', $this->category, true);

        $criteria->compare('message', $this->message, true);

        return new CActiveDataProvider('SourceMessage', array(
                'criteria' => $criteria,
        ));
    }
}

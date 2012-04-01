<?php

/**
 * This is the model class for table "Message".
 *
 * The followings are the available columns in table 'Message':
 * @property integer $id
 * @property string $language
 * @property string $translation
 */
class Message extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @return Message the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Message';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
                array('id', 'numerical', 'integerOnly'=>true),
                array('language', 'length', 'max'=>16),
                array('translation', 'safe'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, language, translation', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'id' => 'Id',
                'language' => 'Language',
                'translation' => 'Translation',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);

        $criteria->compare('language',$this->language,true);

        $criteria->compare('translation',$this->translation,true);

        return new CActiveDataProvider('Message', array(
                'criteria'=>$criteria,
        ));
    }
}

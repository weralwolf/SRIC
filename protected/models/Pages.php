<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property string $id
 * @property string $conferences_id
 * @property string $menu_title
 * @property string $order
 * @property string $texts_id
 */
class Pages extends CActiveRecord {
    /**
     * Returns the static model of the specified AR class.
     * @return Pages the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'pages';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('title_sm_id, order, content_sm_id', 'required'),
            array('order, title_sm_id, content_sm_id', 'length', 'max' => 11),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, order', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'content' => array(self::HAS_ONE, 'SourceMessage', 'content_sm_id', 'with' => 'messages'),
            'title' => array(self::HAS_ONE, 'SourceMessage', 'title_sm_id', 'with' => 'messages')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'menu_title' => 'Menu Title',
            'order' => 'Order',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);

        $criteria->compare('order', $this->order, true);

        return new CActiveDataProvider('Pages', array(
            'criteria' => $criteria,
        ));
    }
}

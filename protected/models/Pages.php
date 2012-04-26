<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property string $id
 * @property string $conferences_id
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
            'content' => array(self::BELONGS_TO, 'SourceMessage', 'content_sm_id', 'with' => 'messages'),
            'title' => array(self::BELONGS_TO, 'SourceMessage', 'title_sm_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'order' => 'Menu order',
            'title' => 'title'
        );
    }

    public static function sideMenu() {
        $usedKeys = array();
        $lines = self::model()->findAll('`order` > 0', array('order' => '`order` ASC'));
        $items = array();
        $key = 0;
        foreach ($lines as $line) {
            $key = self::orderKey($usedKeys, $line->order);
            $usedKeys[] = $key;
            $ordered[$key] = array(
                'label' => Yii::app()->dbMessages->translate($line->title->category, $line->title->message),
                'url' => array('pages/view', 'id' => intval($line->id)),
            );
        }
        foreach (Yii::app()->params['additionalSideMenuElements'] as $index => $info) {
            $key = self::orderKey($usedKeys, $info['order']);
            $usedKeys[] = $key;
            $ordered[$key] = array(
                'label' => Yii::app()->dbMessages->translate($info['title_sm_message'][0], $info['title_sm_message'][1]),
                'url' => $info['url'],
            );
        }
        return $ordered;
    }

    protected static function orderKey($usedKeys, $proposedKey) {
        $key = intval($proposedKey) * 100;
        for (; in_array($key, $usedKeys); $key++)
            ;
        return $key;
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

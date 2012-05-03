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

    public function updateFromPost($identifier = '') {
        $mC = $identifier != '' ? $_POST['Message'][$identifier] : $_POST['Message'];
        $this->attributes = $identifier != '' ? $_POST['SourceMessage'][$identifier] : $_POST['SourceMessage'];
        foreach($this->messages as $message) {
            $data = $mC[$message->language];
            $message->translation = $data['translation'];
            $message->save();
        }
        $this->save();
    }
    
    public static function generateTranslation($message) {
        $trans = array();
        foreach (Yii::app()->params['languages'] as $lang) {
            $trans[$lang] = $message;
        }
        return $trans;
    }

    public static function searchLike($keyword, $category, $language = '') {
        if (empty($language)) {
            $language = Yii::app()->language;
        }
        $c = Yii::app()->db;
        $query = 'SELECT ' .
                $c->quoteTableName('SourceMessage') . '.' . $c->quoteColumnName('id') .
                ' FROM ' .
                $c->quoteTableName('SourceMessage') . ' LEFT JOIN ' .
                $c->quoteTableName('Message') . ' ON ' .
                $c->quoteTableName('Message') . '.' . $c->quoteColumnName('id') .
                ' = ' .
                $c->quoteTableName('SourceMessage') . '.' . $c->quoteColumnName('id') .
                ' WHERE ' .
                $c->quoteTableName('Message') . '.' . $c->quoteColumnName('language') .
                ' = ' . $c->quoteValue($language) . ' AND ' .
                $c->quoteTableName('SourceMessage') . '.' . $c->quoteColumnName('category') .
                ' = ' . $c->quoteValue($category) . ' AND ' .
                $c->quoteTableName('Message') . '.' . $c->quoteColumnName('translation') .
                ' LIKE ' . $c->quoteValue('%' . $keyword . '%') . ';';
        $r = $c->createCommand($query);
        $ids = array();
        foreach($r->queryAll() as $line) {
            $ids[] = $line['id'];
        };
        return $ids;
    }

    public static function searchIt($keyword, $category, $language = '') {
        if (empty($language)) {
            $language = Yii::app()->language;
        }
        $c = Yii::app()->db;
        $query = 'SELECT ' .
                $c->quoteTableName('SourceMessage') . '.' . $c->quoteColumnName('id') .
                ' FROM ' .
                $c->quoteTableName('SourceMessage') . ' LEFT JOIN ' .
                $c->quoteTableName('Message') . ' ON ' .
                $c->quoteTableName('Message') . '.' . $c->quoteColumnName('id') .
                ' = ' .
                $c->quoteTableName('SourceMessage') . '.' . $c->quoteColumnName('id') .
                ' WHERE ' .
                $c->quoteTableName('Message') . '.' . $c->quoteColumnName('language') .
                ' = ' . $c->quoteValue($language) . ' AND ' .
                $c->quoteTableName('SourceMessage') . '.' . $c->quoteColumnName('category') .
                ' = ' . $c->quoteValue($category) . ' AND ' .
                $c->quoteTableName('Message') . '.' . $c->quoteColumnName('translation') .
                ' = ' . $c->quoteValue($keyword) . ';';
        $r = $c->createCommand($query);
        $ids = array();
        foreach($r->queryAll() as $line) {
            $ids[] = $line['id'];
        };
        return $ids;
    }

    /**
     * Suggests a list of existing values matching the specified keyword.
     * @param string the keyword to be matched
     * @param integer maximum number of names to be returned
     * @return array list of matching lastnames
     */
    public function suggestFromCategory($keyword, $category, $limit = 20) {
        $ids = SourceMessage::searchLike($keyword, $category);
        if (!count($ids)) return array();
        
        $models = $this->findAll(array('condition' => 'id in ('. join(', ', $ids) . ')'));
        $suggest = array();
        foreach($models as $model) {
            $suggest[] = array(
                    'value' => $model->t(),
                    'label' => $model->t(),
                    'id' => $model->id,
            );
        }
        return $suggest;
    }
    
    public static function resolveID($name, $category) {
        $id = SourceMessage::searchIt($name, $category);
        return count($id) ? $id[0] : -1;
    }
    
    public static function createMessage($message, $category, $translations) {
        $model = new SourceMessage();
        $model->message = $message;
        $model->category = $category;
        $model->save();
        foreach($translations as $l => $t) {
            $message = new Message();
            $message->language = $l;
            $message->translation = $t;
            $message->id = $model->id;
            $message->save();
        }
        return $model->id;
    } 
    
    static public function resolveName($id) {
        $model = SourceMessage::model()->findByPk(intval($id));
        return $model ? $model->t() : '--unexisted--';
    }
    
    public function t($language = '') {
        if (empty($language)) {
            $language = Yii::app()->language;
        }
        foreach($this->messages as $m) {
            if ($m->language == $language) {
                return $m->translation;
            }
        }
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

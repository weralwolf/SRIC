<?php

/**
 * This is the model class for table "countries".
 *
 * The followings are the available columns in table 'countries':
 * @property string $id
 * @property integer $approved
 */
class Cities extends SourceMessage {
    /**
     * Returns the static model of the specified AR class.
     * @return Countries the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function suggest($keyword, $limit = 20) {
        return $this->suggestFromCategory($keyword, 'Cities', $limit);
    }
    
    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->condition = 'category=' . Yii::app()->db->quoteValue("Cities");
        $criteria->compare('message', $this->message, true);
        return new CActiveDataProvider('SourceMessage', array(
                'criteria' => $criteria,
        ));
    }
}
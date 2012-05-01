<?php

/**
 * This is the model class for table "organizations".
 *
 * The followings are the available columns in table 'organizations':
 * @property string $id
 * @property string $cities_id
 * @property string $title
 * @property integer $approved
 */
class Organizations extends SourceMessage {
    /**
     * Returns the static model of the specified AR class.
     * @return Countries the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function dropDown() {
        $rows = $this->findAll(array('condition' => 'category=' . Yii::app()->db->quoteValue("Organizations"), 'order' => 'message ASC'));
        $dropDown = array(
                '-2' => Yii::app()->dbMessages->translate('Participants', 'no_organization'),
                '-1' => Yii::app()->dbMessages->translate('Participants', 'new_organization')
        );
        foreach ($rows as $row) {
            $dropDown[$row->id] = $row->t();
        }
        return $dropDown;
    }

    public function suggest($keyword, $limit = 20) {
        return $this->suggestFromCategory($keyword, 'Organizations', $limit);
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->condition = 'category=' . Yii::app()->db->quoteValue("Organizations");
        $criteria->compare('message', $this->message, true);
        return new CActiveDataProvider('SourceMessage', array(
                'criteria' => $criteria,
        ));
    }
}
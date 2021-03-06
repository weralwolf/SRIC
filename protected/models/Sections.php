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
class Sections extends SourceMessage {
    /**
     * Returns the static model of the specified AR class.
     * @return Countries the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function suggest($keyword, $limit = 20) {
        return $this->suggestFromCategory($keyword, 'Sections', $limit);
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array_merge(parent::relations(), array(
            'reports' => array(self::HAS_MANY, 'Reports', 'sections_id'),
        ));
    }

    public function dropDown() {
        $rows = $this->findAll(array('condition' => 'category=' . Yii::app()->db->quoteValue("Sections")));
        $dropDown = array();
        foreach ($rows as $row) {
            $dropDown[$row->id] = $row->t();
        }
        return $dropDown;
    }
    
    public static function listForChairsLinks() {
    	$rows = Sections::model()->findAll(array('condition' => 'category=' . Yii::app()->db->quoteValue("Sections")));
    	$links = array();
    	foreach ($rows as $row) {
    		$links[] = array(
    				'label' => Sections::resolveName($row->id),
    				'url' => array('sections/forChairs', 'id' => $row->id),
    				'turl' => array('sections/forChairsTable', 'id' => $row->id),
    				);
    	}
    	return $links;
    }

    public function search() {
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->condition = 'category=' . Yii::app()->db->quoteValue("Sections");
        $criteria->compare('message', $this->message, true);
        return new CActiveDataProvider('SourceMessage', array(
            'criteria' => $criteria,
        ));
    }
}

<?php

class Languages extends CModel {
	public static function actualLanguage() {
	    Yii::app()->language = Yii::app()->session->get('language', Yii::app()->params['languages'][0]);
	    #return Yii::app()->session->get('language', Yii::app()->params['languages'][0]);
	}
	
	public function attributeNames() {
	    return array();
	}
}
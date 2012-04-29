<?php
class ActiveForm extends CActiveForm {
    public function init() {
        CHtml::$afterRequiredLabel = '';
        return parent::init();
    }
}
<?php
if ($textArea) {
    Yii::import('application.extensions.jqClEditor');
    jqClEditor::clEditor("#Message_" . (isset($attributeName) && $attributeName != '' ? $attributeName . '_' : '') .
        $model->language . "_translation", Yii::app()->params['jqClEditor']);
}
$nameIndex = 'Message[' . (isset($attributeName) && $attributeName != '' ? $attributeName . '][' : '');
?>

<div class="row">
<?php
if ($textArea) {
    echo $form->labelEx($model, 'language');
    echo $form->textField($model, 'language', array("readonly" => "readonly",
        "name" => $nameIndex . $model->language . "][language]"));
?>
</div>
<div class="row">
<?php
    echo $form->labelEx($model, 'translation');
    echo $form->textArea($model, 'translation', array('cols' => 120, 'rows' => 10,
        "name" => $nameIndex . $model->language . "][translation]"));
} else {
    echo $form->labelEx($model, 'language', array('style' => 'float: left; width: 50%;'));
    echo $form->textField($model, 'language', array("readonly" => "readonly",
        "name" => $nameIndex . $model->language . "][language]", 'style' => 'float: left; width: 50%;'));
?>
</div>
<div class="row">
<?php
    echo $form->labelEx($model, 'translation', array('style' => 'float: left; width: 50%;'));
    echo $form->textField($model, 'translation', array('size' => 50, 'maxlength' => 255,
        "name" => $nameIndex . $model->language . "][translation]", 'style' => 'float: right; width: 50%;'));
}
?>
</div>
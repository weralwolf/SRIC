<?php
$idIndex = 'Message_' . (isset($attributeName) && $attributeName != '' ? $attributeName . '_' : '') . $model->language  . '_translation';
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
        "name" => $nameIndex . $model->language . "][translation]",
        'class' => 'wymeditor'));
} else {
    echo $form->labelEx($model, 'language');
    echo $form->textField($model, 'language', array("readonly" => "readonly",
        "name" => $nameIndex . $model->language . "][language]"));
?>
</div>
<div class="row">
<?php
    echo $form->labelEx($model, 'translation');
    echo $form->textField($model, 'translation', array('size' => 50, 'maxlength' => 255,
        "name" => $nameIndex . $model->language . "][translation]"));
}
?>
</div>
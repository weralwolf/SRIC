<?php
$idIndex = 'Message_' . (isset($attributeName) && $attributeName != '' ? $attributeName . '_' : '') . $model->language  . '_translation';
$nameIndex = 'Message[' . (isset($attributeName) && $attributeName != '' ? $attributeName . '][' : '');
if ($textArea) {
//     Yii::import('application.extensions.jqClEditor');
//     jqClEditor::clEditor("#Message_" . (isset($attributeName) && $attributeName != '' ? $attributeName . '_' : '') .
//         $model->language . "_translation", Yii::app()->params['jqClEditor']);
    $cs = Yii::app()->clientScript;
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.sortable.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.resizable.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.draggable.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.sortable.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('wymeditor/jquery.wymeditor.js'), CClientScript::POS_HEAD);
    $cs->registerScript($idIndex, '$("#' . $idIndex . '").wymeditor();', CClientScript::POS_LOAD);
}
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
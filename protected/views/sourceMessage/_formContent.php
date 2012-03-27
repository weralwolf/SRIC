<?php $nameIndex = 'SourceMessage[' . (isset($attributeName) && $attributeName != '' ? $attributeName . '][' : ''); ?>

<div class="row">
<?php
if (isset($category) && $category != '') {
    echo $form->hiddenField($model, 'category', array('value' => $category, 'name' => $nameIndex . 'category]'));
} else {
    echo $form->labelEx($model, 'category', array('style' => 'float: left; width: 50%;'));
    echo $form->textField($model, 'category', array('size' => 32, 'maxlength' => 32, 'name' => $nameIndex . 'category]',
        'style' => 'float: right; width: 50%;'));
    echo $form->error($model, 'category');
}
?>
</div>

<div class="row">
	<?php echo $form->labelEx($model, 'message', array('style' => 'float: left; width: 50%;')); ?>
	<?php echo $form->textField($model, 'message', array('size' => 50, 'maxlength' => 256, 'name' => $nameIndex . 'message]',
    'style' => 'float: right; width: 50%;'
));
?>
	<?php echo $form->error($model, 'message'); ?>
</div>

<?php
$languages = array_flip(Yii::app()->params['languages']);
foreach ($model->messages as $n => $message) {
    if (in_array($message->language, Yii::app()->params['languages'])) {
        $languages[$message->language] = $message;
    }
}
foreach ($languages as $language => $message) {
    if (!($message instanceof Message)) {
        $languages[$language] = new Message();
        $message = $languages[$language];
        $message->language = $language;
    }

    $this->renderPartial('application.views.sourceMessage._message', array(
        'model' => $message,
        'form' => $form,
        'textArea' => isset($textArea) ? $textArea : true,
        'attributeName' => isset($attributeName) && $attributeName != '' ? $attributeName : '',
    ));
}
?>
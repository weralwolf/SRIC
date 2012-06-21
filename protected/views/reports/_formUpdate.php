<?php
$m = Yii::app()->dbMessages;
$nameIndex = 'Reports[' . (isset($attributeName) && $attributeName != '' ? $attributeName . '][' : '');
?>
<?php if (isset($attributeName)) { ?>
<div class="ger_title" style="text-align: left;">
	<?php echo $m->translate('Participants', $attributeName == 0 ? 'report_1' : 'report_2'); ?>
</div>
<?php } ?>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'sections_id'); ?>
		<?php echo $form->dropDownList($model, 'sections_id', Sections::model()->dropDown(), array(
    'name'  => $nameIndex . 'sections_id]',
    'style' => 'width: 100%;',
));
?>
		<?php echo $form->error($model, 'sections_id'); ?>
	</div>
</div>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array(
    'size'      => 100,
    'maxlength' => 255,
    'name'      => $nameIndex . 'title]',
    'value'     => $model->title,
));
?>
		<?php echo $form->error($model, 'title'); ?>
	</div>
</div>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'autors'); ?>
		<?php echo $form->textField($model, 'autors', array(
    'size'      => 100,
    'maxlength' => 255,
    'name'      => $nameIndex . 'autors]',
    'value'     => $model->autors,
));
?>
		<?php echo $form->error($model, 'autors'); ?>
	</div>
</div>
<div class="one_input tezisi">
	<div class="rowElem">
    <?php echo $form->labelEx($model, 'files_id'); ?>
    <?php echo $form->hiddenField($model, 'files_id'); ?>
<?php
echo Yii::app()->controller->renderPartial('application.views.files.button', array(
    'model' => $model->file,
    'title' => $model->title,
    'report_id' => $model->id,
));
?>
	</div>
</div>

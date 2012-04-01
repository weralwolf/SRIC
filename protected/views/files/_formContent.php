<!-- names difference like in sourceMessages form -->

<?php $nameIndex = 'Files[' . (isset($attributeName) && $attributeName != '' ? $attributeName . '][' : ''); ?>
<div class="row">
	<?php echo $form->labelEx($model,'file'); ?>
	<?php echo CHtml::activeFileField($model, 'file', array('name' => $nameIndex . 'file]')); ?>
	<?php echo $form->error($model,'file'); ?>
</div>

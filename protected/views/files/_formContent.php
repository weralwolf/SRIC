<!-- names difference like in sourceMessages form -->

<?php $nameIndex = 'Files[' . (isset($attributeName) && $attributeName != '' ? $attributeName . '][' : ''); ?>
<div class="row">
	<button id="" name="" type="button"
		class="jqTransformButton jqTransformButton_click">
		<span> <?php echo CHtml::activeFileField($model, 'file', array('name' => $nameIndex . 'file]', 'alt' => 'button', 'type' => 'button')); ?>
		</span>
	</button>
	<?php echo $form->error($model,'file'); ?>
</div>

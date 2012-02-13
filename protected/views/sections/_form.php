<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sections-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'conferences_id'); ?>
		<?php echo $form->textField($model,'conferences_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'conferences_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subtitle'); ?>
		<?php echo $form->textArea($model,'subtitle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'subtitle'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'conferences-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description_texts_id'); ?>
		<?php echo $form->textField($model,'description_texts_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'description_texts_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_begin'); ?>
		<?php echo $form->textField($model,'registration_begin'); ?>
		<?php echo $form->error($model,'registration_begin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_end'); ?>
		<?php echo $form->textField($model,'registration_end'); ?>
		<?php echo $form->error($model,'registration_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thesesis_begin'); ?>
		<?php echo $form->textField($model,'thesesis_begin'); ?>
		<?php echo $form->error($model,'thesesis_begin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thesesis_end'); ?>
		<?php echo $form->textField($model,'thesesis_end'); ?>
		<?php echo $form->error($model,'thesesis_end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
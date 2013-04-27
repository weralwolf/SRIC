<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'report-authors-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'reports_id'); ?>
		<?php echo $form->textField($model,'reports_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'reports_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authors'); ?>
		<?php echo $form->textArea($model,'authors',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'authors'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->textArea($model,'department',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
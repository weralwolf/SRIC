<div class="form">

<?php 
    Yii::import('application.extensions.jqClEditor');
    $form = $this->beginWidget('CActiveForm', array(
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
));
jqClEditor::clEditor('#Pages_texts_id', Yii::app()->params['jqClEditor']); 
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'conferences_id'); ?>
		<?php echo $form->textField($model,'conferences_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'conferences_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_title'); ?>
		<?php echo $form->textField($model,'menu_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'menu_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texts_id'); ?>
		<?php echo $form->textArea($model,'texts_id'); ?>
		<?php echo $form->error($model,'texts_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
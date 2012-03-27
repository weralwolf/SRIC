<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'source-message-form',
    'enableAjaxValidation' => false,
));
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $this->renderPartial('_formContent', array(
    'form' => $form,
    'model' => $model
))?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
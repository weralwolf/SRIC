<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'reports-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
));
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $this->renderPartial('application.views.reports._formContent', array(
	    'model' => $model,
	    'form' => $form,
	)); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
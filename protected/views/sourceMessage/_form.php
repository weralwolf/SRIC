<div class="form">

	<?php $form = $this->beginWidget('ActiveForm', array(
	        'id' => 'source-message-form',
	        'enableAjaxValidation' => false,
	));
	?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $this->renderPartial('application.views.sourceMessage._formContent', array(
	        'form' => $form,
	        'model' => $model,
	        'textArea' => isset($textArea) ? $textArea : true,
	        'category' => isset($category) && !empty($category) ? $category : ''
))?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', 
		        array('class' => "wymupdate")); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->

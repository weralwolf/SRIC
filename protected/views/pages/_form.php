<div class="form">

<?php
Yii::import('application.extensions.jqClEditor');
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pages-form',
    'enableAjaxValidation' => false,
));
jqClEditor::clEditor('#Pages_texts_id', Yii::app()->params['jqClEditor']);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
<?php
echo $form->labelEx($model, 'order', array('style' => 'float: left; width: 50%;'));
echo $form->textField($model, 'order', array('size' => 10, 'maxlength' => 10, 'style' => 'float: right; width: 50%;'));
echo $form->error($model, 'order');
?>
	</div>
	<div class="row">~~~~~~~~~~~~~~~~~~~~~~ Title ~~~~~~~~~~~~~~~~~~~~~~</div>
<?php
echo $this->renderPartial('application.views.sourceMessage._formContent', array(
    'form' => $form,
    'model' => $model->isNewRecord ? new SourceMessage : $model->title,
    'textArea' => false,
    'attributeName' => 'title',
    'category' => 'Pages',
));
?>
	<div class="row">~~~~~~~~~~~~~~~~~~~~~ Content ~~~~~~~~~~~~~~~~~~~~~</div>	
<?php
echo $this->renderPartial('application.views.sourceMessage._formContent', array(
    'form' => $form,
    'model' => $model->isNewRecord ? new SourceMessage : $model->content,
    'textArea' => true,
    'attributeName' => 'content',
    'category' => 'Pages',
));
?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
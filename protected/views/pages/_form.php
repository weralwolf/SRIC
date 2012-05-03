<div class="form">

<?php
// Yii::import('application.extensions.jqClEditor');
$form = $this->beginWidget('ActiveForm', array(
    'id' => 'pages-form',
    'enableAjaxValidation' => false,
));
Yii::import('application.extensions.jqClEditor');
jqClEditor::clEditor('#Pages_texts_id', Yii::app()->params['jqClEditor']);
// $cs = Yii::app()->clientScript;
// $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.sortable.js'), CClientScript::POS_HEAD);
// $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.resizable.js'), CClientScript::POS_HEAD);
// $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.js'), CClientScript::POS_HEAD);
// $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.draggable.js'), CClientScript::POS_HEAD);
// $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.sortable.js'), CClientScript::POS_HEAD);
// $cs->registerScriptFile(XHtml::jsUrl('wymeditor/jquery.wymeditor.js'), CClientScript::POS_HEAD);
// $cs->registerScript("wymeditor", '$(".wymeditor").wymeditor();', CClientScript::POS_LOAD);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
<?php
echo $form->labelEx($model, 'order');
echo $form->textField($model, 'order', array('size' => 10, 'maxlength' => 10));
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', 
		        array('class' => "wymupdate")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
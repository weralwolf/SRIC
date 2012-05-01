<?php
if ($textArea) {
    //     Yii::import('application.extensions.jqClEditor');
    //     jqClEditor::clEditor("#Message_" . (isset($attributeName) && $attributeName != '' ? $attributeName . '_' : '') .
    //         $model->language . "_translation", Yii::app()->params['jqClEditor']);
    $cs = Yii::app()->clientScript;
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.sortable.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.resizable.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.draggable.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('jquery.ui.sortable.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('wymeditor/jquery.wymeditor.js'), CClientScript::POS_HEAD);
    $cs->registerScript("wymeditor", '$(".wymeditor").wymeditor();', CClientScript::POS_LOAD);
} 
?>
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

<?php $nameIndex = 'Reports[' . (isset($attributeName) && $attributeName != '' ? $attributeName . '][' : ''); ?>
<div class="row">
	<?php echo $form->checkBox($model, 'enabled', 
	        array(
	                'name' => $nameIndex . 'enabled]',
// 	                'style' => 'float: left; width: 30px;'
	        )
	) . ' ' . $form->labelEx($model, 'enabled',
	        array(
// 	                'style' => 'float: right; width: 95%;'
	        )
    ); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model, 'sections_id', 
	        array(
// 	                'style' => 'float: left; width: 50%;'
	        )
    ); ?>
	<?php echo $form->dropDownList($model, 'sections_id', Sections::model()->dropDown(), 
	        array(
	                'name' => $nameIndex . 'section_id]',
// 	                'style' => 'float: right; width: 50%;'
	        )
    ); ?>
	<?php echo $form->error($model, 'sections_id'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model, 'title'); ?>
	<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'name' => $nameIndex . 'title]')); ?>
	<?php echo $form->error($model, 'title'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model, 'autors'); ?>
	<?php echo $form->textArea($model, 'autors', array('rows' => 6, 'cols' => 50, 'name' => $nameIndex. 'autors]')); ?>
	<?php echo $form->error($model, 'autors'); ?>
</div>

<?php $this->renderPartial('application.views.files._formContent', array(
        'form' => $form,
        'model' => is_null($model->file) ? new Files() : $model->file,
        'attributeName' => isset($attributeName) && $attributeName != '' ? $attributeName : '',
)); ?>
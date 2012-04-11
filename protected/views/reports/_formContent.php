<?php
$m = Yii::app()->messages;
$nameIndex = 'Reports[' . (isset($attributeName) && $attributeName != '' ? $attributeName . '][' : ''); ?>
<!--<div class="row">
	<?php echo $form->checkBox($model, 'enabled', 
	        array(
	                'name' => $nameIndex . 'enabled]',
	        )
	) . ' ' . $form->labelEx($model, 'enabled',
	        array(
	        )
    ); ?>
</div>-->

<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'sections_id'); ?>
		<?php echo $form->dropDownList($model, 'sections_id', Sections::model()->dropDown(), 
		        array(
		                'name' => $nameIndex . 'sections_id]',
		        )
    ); ?>
		<?php echo $form->error($model, 'sections_id'); ?>
	</div>
</div>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', 
		        array('size' => 60,
		                'maxlength' => 255,
		                'name' => $nameIndex . 'title]',
		                'value' => "как в тезисах",
		                'onfocus' => "this.value='';",
			'onblur' => "if (this.value != '') {this.onfocus = function() {this.style.backgroundColor='#f3fdff';};} else this.value='название доклада';")); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>
</div>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'autors'); ?>
		<?php echo $form->textField($model, 'autors', 
		        array('rows' => 6,
		                'cols' => 50,
		                'name' => $nameIndex. 'autors]',
		                'value' => "как в тезисах, ФИО докладывающего автора необходимо подчеркнуть",
		                'onfocus' => "this.value='';",
			'onblur' => "if (this.value != '') {this.onfocus = function() {this.style.backgroundColor='#f3fdff';};} else this.value='как в тезисах, ФИО докладывающего автора необходимо подчеркнуть';")); ?>
		<?php echo $form->error($model, 'autors'); ?>
	</div>
</div>
<div class="one_input tezisi">
	<div class="rowElem">
		<label><?php echo $m->translate('Participants', 'file_upload_note'); ?></label>
		<?php $this->renderPartial('application.views.files._formContent', array(
		        'form' => $form,
		        'model' => is_null($model->file) ? new Files() : $model->file,
		        'attributeName' => isset($attributeName) && $attributeName != '' ? $attributeName : '',
)); ?>
	</div>
</div>

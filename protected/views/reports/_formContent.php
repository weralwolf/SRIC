<?php
$m = Yii::app()->dbMessages;
$nameIndex = 'Reports[' . (isset($attributeName) && $attributeName != '' ? $attributeName . '][' : ''); ?>
<!--<div class="row">
<?php
    echo $form->checkBox($model, 'enabled', 
            array(
                    'name' => $nameIndex . 'enabled]',
            )
    ) . ' ' . $form->labelEx($model, 'enabled',
            array(
            )
    );
    
    $cs = Yii::app()->clientScript;
    $cs->registerScript("report_transform", 
            '$(\'input[name*="Reports"]\').each(function(){
                    $(this).bind("blur", function(){
                        if (this.value != \'\') {
                            this.onfocus = function() {
                                this.style.backgroundColor=\'#f3fdff\';
                            };
                        } else 
                            this.value=\'' . $m->translate('Participants', 'like_in_abstracts') . '\';
                    })
            });',
            CClientScript::POS_LOAD
    );
?>
</div>-->
<?php if (isset($attributeName)) {?>
<div class="ger_title" style="text-align: left;">
	<?php echo $m->translate('Participants', $attributeName == 0 ? 'report_1' : 'report_2');?>
</div>
<?php }?>
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
		                'value' => $m->translate('Participants', 'like_in_abstracts'),
		                'onfocus' => "this.value='';",
			'onblur' => "if (this.value != '') {this.onfocus = function() {this.style.backgroundColor='#f3fdff';};} else this.value='" . $m->translate('Participants', 'like_in_abstracts') . "';")); ?>
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
		                'value' => $m->translate('Participants', 'like_in_abstracts'),
		                'onfocus' => "this.value='';",
			'onblur' => "if (this.value != '') {this.onfocus = function() {this.style.backgroundColor='#f3fdff';};} else this.value='" . $m->translate('Participants', 'like_in_abstracts') . "';")); ?>
		<?php echo $form->error($model, 'autors'); ?>
	</div>
</div>
<div class="one_input tezisi">
	<div class="rowElem">
		<label><?php echo $m->translate('Participants', 'file_upload_note'); ?>
		</label>
		<?php $this->renderPartial('application.views.files._formContent', array(
		        'form' => $form,
		        'model' => is_null($model->file) ? new Files() : $model->file,
		        'attributeName' => isset($attributeName) && $attributeName != '' ? $attributeName : '',
)); ?>
	</div>
</div>

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
    
?>
</div>-->
<?php if (isset($attributeName)) {?>
<div class="ger_title" style="text-align: left;">
	<?php echo $m->translate('Participants', $attributeName == 0 ? 'report_1' : 'report_2');?>
</div>
<?php }?>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'type'); ?>
		<?php echo $form->dropDownList($model, 'type', Reports::types(), 
				array(
		                'name' => $nameIndex . 'type]',
		        )
    ); ?>
		<?php echo $form->error($model, 'type'); ?>
	</div>
</div>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'sections_id'); ?>
		<?php echo $form->dropDownList($model, 'sections_id', Sections::model()->dropDown(), 
				array(
		                'name' => $nameIndex . 'sections_id]',
		                'style' => 'width: 100%;',
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
		                'placeholder' => $m->translate('Report', 'title_placeholder'),
		)); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>
</div>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'autors'); ?>
		<?php echo $form->textField($model, 'autors', 
				array(
						'size' => 6,
		                'maxlength' => 255,
		                'name' => $nameIndex. 'autors]',
		                'placeholder' => $m->translate('Report', 'autors_placeholder'),
		)); ?>
		<?php echo $form->error($model, 'autors'); ?>
	</div>
</div>

<div class="one_input wide" style="height: 80px;">
	<div class="rowElem" style="height: 96px; width: 700px;top: -24px;left: 120px;overflow: hidden;outline: 0;padding: 0;border: 0;margin: 0px 8px;">
		<?php echo $form->labelEx($model, 'description', array(
				'style' => 'margin-left: -9px;',
				)); ?>
		<?php echo $form->textArea($model, 'description', 
				array(
						'rows' => 4,
		                'cols' => 50,
		                'name' => $nameIndex. 'description]',
						'class' => 'report_description notransform',
		                'placeholder' => $m->translate('Report', 'description_placeholder'),
		)); ?>
		<?php echo $form->error($model, 'autors'); ?>
	</div>
</div>

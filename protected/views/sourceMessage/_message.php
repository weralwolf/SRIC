<div class="row">
	<?php echo $form->labelEx($model,'language'); ?>
	<?php echo $form->textField($model,'language', array("readonly" => "readonly", 
	"name" => "Message[".$model->language."][language]")); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model,'translation'); ?>
	<?php echo $form->textArea($model,'translation', array('cols'=>120, 'rows'=>5, 
	"name" => "Message[".$model->language."][translation]")); ?>
</div>
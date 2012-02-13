<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description_texts_id'); ?>
		<?php echo $form->textField($model,'description_texts_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registration_begin'); ?>
		<?php echo $form->textField($model,'registration_begin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registration_end'); ?>
		<?php echo $form->textField($model,'registration_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thesesis_begin'); ?>
		<?php echo $form->textField($model,'thesesis_begin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thesesis_end'); ?>
		<?php echo $form->textField($model,'thesesis_end'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
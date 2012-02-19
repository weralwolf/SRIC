<div class="form">

<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'participants-form',
	'enableAjaxValidation'=>false,
));

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'approved'); ?>
		<?php echo $form->textField($model,'approved'); ?>
		<?php echo $form->error($model,'approved'); ?>
	</div>
	-->

	<div class="row">
		<?php echo $form->labelEx($model,'contries_id'); ?>
		<?php //echo $form->textField($model,'contries_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			//'model'=>$model,
			//'attribute'=>'id',
			'id'=>'countryName',
			'name'=>'countryName',
			'source'=>$this->createUrl('request/suggestCountry'),
			'htmlOptions'=>array(
				'size'=>'40'
			),
		));?>
		<?php echo $form->error($model,'contries_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cities_id'); ?>
		<?php echo $form->textField($model,'cities_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cities_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'second_name'); ?>
		<?php echo $form->textField($model,'second_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'second_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->dropDownList($model, 'gender', array("0" => "Female", "1" => "Male")); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthdate'); ?>
		<?php //echo $form->textField($model,'birthdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'name'=>'birthdate',
		    // additional javascript options for the date picker plugin
		    'model' => $model,
		
			'attribute' => 'birthdate',
		
		    'options'=>array(
		        'showAnim'=>'fold',
		    ),
		
		    'htmlOptions'=>array(
		        'style'=>'height:20px;'
		    ),
		));?>
		<?php echo $form->error($model,'birthdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organizations_id'); ?>
		<?php echo $form->textField($model,'organizations_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'organizations_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'post'); ?>
		<?php echo $form->textField($model,'post',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'post'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'participation_type'); ?>
		<?php echo $form->textField($model,'participation_type',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'participation_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'report_type'); ?>
		<?php echo $form->textField($model,'report_type',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'report_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sections_id'); ?>
		<?php echo $form->textField($model,'sections_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sections_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accommodation_places_id'); ?>
		<?php echo $form->textField($model,'accommodation_places_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'accommodation_places_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accommodation_places_rooms_types_id'); ?>
		<?php echo $form->textField($model,'accommodation_places_rooms_types_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'accommodation_places_rooms_types_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
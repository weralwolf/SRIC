<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
	        'id' => 'participants-form',
	        'enableAjaxValidation' => false,
	));

	$m = Yii::app()->messages;
	?>
	<!--p class="note">Fields with <span class="required">*</span> are required.</p-->
	<?php echo $form->errorSummary($model); ?>

	<!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'approved'); ?>
		<?php echo $form->textField($model,'approved'); ?>
		<?php echo $form->error($model,'approved'); ?>
	</div>
	-->

	<div class="registrationBlock">
		<p class="title">
			<?php echo $m->translate('Participants', 'personal_data_title'); ?>
		</p>
		<p class="note">
			<?php echo $m->translate('Participants', 'personal_data_note'); ?>
		</p>
		<div class="row" style="float: left; width: 50%;">
			<?php echo $form->labelEx($model, 'contries_id'); ?>
			<?php //echo $form->textField($model,'contries_id',array('size'=>10,'maxlength'=>10)); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			        //'model'=>$model,
			        //'attribute'=>'id',
			        'id' => 'countryName',
			        'name' => 'countryName',
			        'source' => $this->createUrl('request/suggestCountry'),
			        'value' => $model->country,
			        'htmlOptions' => array(
			                //				'size'=>'40'
			                'style' => "width: 95%;"
			        ),
			));
			?>
			<?php echo $form->error($model, 'contries_id'); ?>
		</div>

		<div class="row" style="float: right; width: 50%;">
			<?php echo $form->labelEx($model, 'cities_id'); ?>
			<?php //echo $form->textField($model,'cities_id',array('size'=>10,'maxlength'=>10)); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			        //'model'=>$model,
			        //'attribute'=>'id',
			        'id' => 'cityName',
			        'name' => 'cityName',
			        'value' => $model->city,
			        'source' => $this->createUrl('request/suggestCity'),
			        'htmlOptions' => array(
			                //				'size'=>'40'
			                'style' => "width: 100%;"
			        ),
			));
			?>
			<?php echo $form->error($model, 'cities_id'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'name'); ?>
			<?php echo $form->textField($model, 'name', array('style' => "width: 100%;", 'maxlength' => 255)); ?>
			<?php echo $form->error($model, 'name'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'second_name'); ?>
			<?php echo $form->textField($model, 'second_name', array('style' => "width: 100%;", 'maxlength' => 255)); ?>
			<?php echo $form->error($model, 'second_name'); ?>
		</div>

		<div class="row" style="width: 100%;">
			<?php echo $form->labelEx($model, 'last_name'); ?>
			<?php echo $form->textField($model, 'last_name', array('style' => "width: 100%;", 'maxlength' => 255)); ?>
			<?php echo $form->error($model, 'last_name'); ?>
		</div>

		<div class="row" style="float: left; width: 50%;">
			<?php echo $form->labelEx($model, 'gender'); ?>
			<?php echo $form->dropDownList($model, 'gender', array("0" => "Female", "1" => "Male")); ?>
			<?php echo $form->error($model, 'gender'); ?>
		</div>

		<div class="row" style="float: right; width: 50%;">
			<?php echo $form->labelEx($model, 'birthdate'); ?>
			<?php //echo $form->textField($model,'birthdate'); ?>
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			        'name' => 'birthdate',
			        // additional javascript options for the date picker plugin
			        'model' => $model,

			        'attribute' => 'birthdate',

			        'options' => array(
			                'showAnim' => 'fold',
			        ),

			        'htmlOptions' => array(
			                'style' => 'height:20px;'
			        ),
			));
			?>
			<?php echo $form->error($model, 'birthdate'); ?>
		</div>

		<div class="row" style="width: 100%;">
			<?php echo $form->labelEx($model, 'organizations_id'); ?>
			<?php //echo $form->textField($model,'organizations_id',array('size'=>10,'maxlength'=>10)); ?>
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			        //'model'=>$model,
			        //'attribute'=>'id',
			        'id' => 'organizationName',
			        'name' => 'organizationName',
			        'value' => $model->organization,
			        'source' => $this->createUrl('request/suggestOrganization'),
			        'htmlOptions' => array(
			                //				'size'=>'40'
			                'style' => "width: 100%;",
			        ),
			));
			?>
			<?php echo $form->error($model, 'organizations_id'); ?>
		</div>

		<div class="row" style="width: 100%;">
			<?php echo $form->labelEx($model, 'post'); ?>
			<?php echo $form->textField($model, 'post', array('style' => "width: 100%;", 'maxlength' => 255)); ?>
			<?php echo $form->error($model, 'post'); ?>
		</div>

		<div class="row" style="float: left; width: 50%;">
			<?php echo $form->labelEx($model, 'email'); ?>
			<?php echo $form->textField($model, 'email', array('style' => "width: 95%;", 'maxlength' => 255)); ?>
			<?php echo $form->error($model, 'email'); ?>
		</div>

		<div class="row" style="float: right; width: 50%;">
			<?php echo $form->labelEx($model, 'phone'); ?>
			<?php echo $form->textField($model, 'phone', array('style' => "width: 100%;", 'maxlength' => 255)); ?>
			<?php echo $form->error($model, 'phone'); ?>
		</div>
	</div>

	<div class="registrationBlock">
		<p class="title">
			<?php echo $m->translate('Participants', 'report_title'); ?>
		</p>
		<p class="note">
			<?php echo $m->translate('Participants', 'report_note_p1'); ?>
		</p>
		<p class="note">
			<?php echo $m->translate('Participants', 'report_note_p2'); ?>
		</p>
		<div class="row" style="overflow: auto;">
			<?php echo $form->labelEx($model, 'participation_type'); ?>
			<?php echo $form->radioButtonList($model, 'participation_type', array(
			        "lecturer" => $m->translate('Participants', 'participation_type_lecturer'),
			        "listner" => $m->translate('Participants', 'participation_type_listner'),
			), array("style" => "float: left; margin-right: 5px;"));
			?>
			<?php echo $form->error($model, 'participation_type'); ?>
		</div>

		<div class="row" style="overflow: auto;">
			<?php echo $form->labelEx($model, 'report_type'); ?>
			<?php echo $form->radioButtonList($model, 'report_type', array(
			        "plenary" => $m->translate('Participants', 'report_type_plenary'),
			        "sessional" => $m->translate('Participants', 'report_type_sessional'),
			        "poster" => $m->translate('Participants', 'report_type_poster'),
			), array("style" => "float: left; margin-right: 5px;"));
			?>
			<?php echo $form->error($model, 'report_type'); ?>
		</div>

	</div>

	<div class="row" style="float: left; width: 50%;">
		<?php echo $form->labelEx($model, 'accommodation_places_id'); ?>
		<?php echo $form->dropDownList($model, 'accommodation_places_id', Sections::model()->dropDown()); ?>
		<!-- ?php echo $form->textField($model,'accommodation_places_id',array('size'=>10,'maxlength'=>10)); ? -->
		<?php echo $form->error($model, 'accommodation_places_id'); ?>
	</div>

	<div class="row" style="float: right; width: 50%;">
		<?php echo $form->labelEx($model, 'accommodation_places_rooms_types_id'); ?>
		<?php echo $form->dropDownList($model, 'accommodation_places_rooms_types_id', Sections::model()->dropDown()); ?>
		<!-- ?php echo $form->textField($model,'accommodation_places_rooms_types_id',array('size'=>10,'maxlength'=>10)); ? -->
		<?php echo $form->error($model, 'accommodation_places_rooms_types_id'); ?>
	</div>

	<?php
	for ($i = 0; $i < 2; $i++) {
	    echo $this->renderPartial('application.views.reports._formContent', array(
	            'model' => isset($model->reports[$i]) ? $model->reports[$i] : new Reports(),
	            'form' => $form,
	            'attributeName' => (string)$i,
	    ));
	}
	?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->

<?php
$form = $this->beginWidget('CActiveForm', array(
        'id' => 'participants-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
));

$m = Yii::app()->messages;
$cs = Yii::app()->clientScript;
$cs->registerScript("transformation", "$(function(){
        $('#participants-form').jqTransform({imgPath:'images/form_img/'});
});", CClientScript::POS_HEAD);
?>
<h1>
	<?php echo $m->translate('Participants', 'personal_data_title'); ?>
</h1>
<p>
	<?php echo $m->translate('Participants', 'personal_data_note'); ?>
</p>
<!-- <form action="" class="reg_form"> -->
<table class="personal">
	<tr>
		<td width="320"><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'last_name', array('style' => 'display: inline;')); ?>
					<?php echo $form->textField($model, 'last_name', array('style' => "display: inline;", 'maxlength' => 255)); ?>
					<?php echo $form->error($model, 'last_name'); ?>
				</div>
			</div></td>
		<td width="360"><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'name', array('style' => 'display: inline;')); ?>
					<?php echo $form->textField($model, 'name', array('style' => "display: inline;", 'maxlength' => 255)); ?>
					<?php echo $form->error($model, 'name'); ?>
				</div>
			</div></td>
	</tr>
	<tr>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'second_name', array('style' => 'display: inline;')); ?>
					<?php echo $form->textField($model, 'second_name', array('style' => "display: inline;", 'maxlength' => 255)); ?>
					<?php echo $form->error($model, 'second_name'); ?>
				</div>
			</div></td>
		<td>
	
	</tr>
	<tr>
		<td class="small"><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'gender', array('style' => 'display: inline;')); ?>
					<?php echo $form->dropDownList($model, 'gender', array("0" => "Female", "1" => "Male"), array('style' => 'display: inline;')); ?>
					<?php echo $form->error($model, 'gender'); ?>
				</div>
			</div></td>
		<td class="small"><div class="one_input birth">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'birthdate', array('style' => 'display: inline;')); ?>
					<?php echo $form->dropDownList($model, 'day', Participants::daysList(), array('style' => 'display: inline;')); ?>
					<?php echo $form->dropDownList($model, 'month', Participants::monthsList(), array('style' => 'display: inline;')); ?>
					<?php echo $form->dropDownList($model, 'year', Participants::yearsList(), array('style' => 'display: inline;')); ?>
				</div>
			</div></td>
	</tr>
	<tr>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'contries_id'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					        'id' => 'countryName',
					        'name' => 'countryName',
					        'source' => $this->createUrl('request/suggestCountry'),
					        'value' => $model->country,
					        'htmlOptions' => array(
					                'style' => 'display: inline;'
					        ),
					));
					?>
					<?php echo $form->error($model, 'contries_id'); ?>
				</div>
			</div></td>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'cities_id'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					        'id' => 'cityName',
					        'name' => 'cityName',
					        'value' => $model->city,
					        'source' => $this->createUrl('request/suggestCity'),
					        'htmlOptions' => array(
					                'style' => 'display: inline;'
					        ),
					));
					?>
					<?php echo $form->error($model, 'cities_id'); ?>
				</div>
			</div></td>
	</tr>
	<tr>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'organizations_id'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
					        'id' => 'organizationName',
					        'name' => 'organizationName',
					        'value' => $model->organization,
					        'source' => $this->createUrl('request/suggestOrganization'),
					        'htmlOptions' => array(
					                'style' => 'display: inline;'
					        ),
					));
					?>
					<?php echo $form->error($model, 'organizations_id'); ?>
				</div>
			</div></td>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'post'); ?>
					<?php echo $form->textField($model, 'post', array('style' => "display: inline;", 'maxlength' => 255)); ?>
					<?php echo $form->error($model, 'post'); ?>
				</div>
			</div></td>
	</tr>
	<tr>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'phone'); ?>
					<?php echo $form->textField($model, 'phone', array('style' => "display: inline;", 'maxlength' => 255)); ?>
					<?php echo $form->error($model, 'phone'); ?>
				</div>
			</div></td>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'email'); ?>
					<?php echo $form->textField($model, 'email', array('style' => "wdisplay: inline;", 'maxlength' => 255)); ?>
					<?php echo $form->error($model, 'email'); ?>
				</div>
			</div></td>
	</tr>
</table>
<div class="ger_title">
	<?php echo $m->translate('Participants', 'report_title'); ?>
</div>
<p>
	<?php echo $m->translate('Participants', 'report_note_p1'); ?>
</p>
<p>
	<?php echo $m->translate('Participants', 'report_note_p2'); ?>
</p>
<div class="one_input">
	<div class="rowElem">
		<table class="aricletype">
			<tr height="22">
				<td width="120" valign="top"><?php echo $form->labelEx($model, 'participation_type'); ?>
				</td>
				<td><?php echo $form->radioButtonList($model, 'participation_type', array(
				        "lecturer" => $m->translate('Participants', 'participation_type_lecturer'),
				        "listner" => $m->translate('Participants', 'participation_type_listner'),
				), array("style" => "float: left; margin-right: 5px;"));
				?>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="one_input">
	<div class="rowElem">
		<table class="aricletype">
			<tr height="22">
				<td width="120" valign="top"><?php echo $form->labelEx($model, 'report_type'); ?>
				</td>
				<td><?php echo $form->radioButtonList($model, 'report_type', array(
				        "plenary" => $m->translate('Participants', 'report_type_plenary'),
				        "sessional" => $m->translate('Participants', 'report_type_sessional'),
				        "poster" => $m->translate('Participants', 'report_type_poster'),
				), array("style" => "float: left; margin-right: 5px;"));?> <?php echo $form->error($model, 'report_type'); ?>
				</td>
			</tr>
		</table>
	</div>
</div>
<!-- ------------------------------------------------------------- REPORT FORM PART -->
<?php
for ($i = 0; $i < 2; $i++) {
    echo $this->renderPartial('application.views.reports._formContent', array(
            'model' => isset($model->reports[$i]) ? $model->reports[$i] : new Reports(),
            'form' => $form,
            'attributeName' => (string)$i,
    ));
}
?>
<p>
	Требования к оформлению указаны в меню <a href="#">тезисы</a>.
</p>
<!-- ------------------------------------------------------------- REPORT FORM PART -->
<div class="ger_title">
	<?php echo $m->translate('Participants', 'accommodation_title'); ?>
</div>
<p>
	<?php echo $m->translate('Participants', 'accommodation_note'); ?>
</p>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'accommodation_places_id'); ?>
		<?php echo $form->dropDownList($model, 'accommodation_places_id', Sections::model()->dropDown()); ?>
		<?php echo $form->error($model, 'accommodation_places_id'); ?>
	</div>
</div>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'accommodation_places_rooms_types_id'); ?>
		<?php echo $form->dropDownList($model, 'accommodation_places_rooms_types_id', Sections::model()->dropDown()); ?>
		<?php echo $form->error($model, 'accommodation_places_rooms_types_id'); ?>
	</div>
</div>
<div class="one_input submit">
	<div class="rowElem">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
<!-- </form> -->

<?php
$form = $this->beginWidget('ActiveForm', array(
        'id' => 'participants-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
));

$m = Yii::app()->dbMessages;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(XHtml::jsUrl('jquery.maskedinput-1.3.js'), CClientScript::POS_HEAD);
$cs->registerScript("transformation",
        "$(function(){
        $('#participants-form').jqTransform({imgPath:'images/form_img/'});
});", CClientScript::POS_HEAD);

$cs->registerScript("reports_hide",
        "$('[id*=\"Participants_participation_type_\"]').each(function() {
        var number = parseInt($(this).attr('id').match(/[0-9]+/)[0]);
        $(this).parent().children().filter('a').bind('click', function(){
        $('#report_form_fields').css('display', number ? 'none' : 'block');
})
});", CClientScript::POS_LOAD);

$cs->registerScript('organization changer',
'$(\'#Participants_organizations_id\').parent().children(\'ul\').children(\'li\')
		.children(\'a\').each(function() {
			$(this).bind(\'click\', function() {
				if ($(\'#Participants_organizations_id\').attr(\'value\') == -1) {
					$(\'#alt_organization\').show();
				} else {
					$(\'#alt_organization\').hide();
				}
			});
		});', CClientScript::POS_LOAD);
$cs->registerScript("alt_org_transform",
'$(\'#Participants_alt_organization\').bind("blur", function() {
	if (this.value == \'\') {
		this.value = \'' . Yii::app()->messages->translate('Participants', 'alt_organization') . '\';
	}
});
$(\'#Participants_alt_organization\').bind("focus", function() {
        if (this.value == \'' . Yii::app()->messages->translate('Participants', 'alt_organization') . '\') {
		    this.value = \'\';
		}
});', CClientScript::POS_LOAD);

$cs->registerScript("form_mask",
        "jQuery(function($){ $('#Participants_birthdate').mask('9999-99-99'); });", CClientScript::POS_LOAD);
$cs->registerScript("biethdate_transform",
'$(\'#Participants_birthdate\').bind("blur", function() {
    if (this.value == \'\') {
        this.value = \'yyyy-mm-dd\';
    }
});
$(\'#Participants_birthdate\').attr("value", "yyyy-mm-dd");', CClientScript::POS_LOAD);
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
					<?php echo $form->labelEx($model, 'last_name'); ?>
					<?php echo $form->textField($model, 'last_name', array('maxlength' => 255)); ?>
					<?php echo $form->error($model, 'last_name'); ?>
				</div>
			</div></td>
		<td width="360"><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'name'); ?>
					<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
					<?php echo $form->error($model, 'name'); ?>
				</div>
			</div></td>
	</tr>
	<tr>
		<td><div class="one_input">
				<div class="rowElem">
    				<?php if (Yii::app()->language != 'en') { ?>
    					<?php echo $form->labelEx($model, 'second_name'); ?>
    					<?php echo $form->textField($model, 'second_name', array('maxlength' => 255)); ?>
    					<?php echo $form->error($model, 'second_name'); ?>
    				<?php }?>
				</div>
			</div></td>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'post'); ?>
					<?php echo $form->textField($model, 'post', array('maxlength' => 255)); ?>
					<?php echo $form->error($model, 'post'); ?>
				</div>
			</div></td>
	
	</tr>
	<tr>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'gender'); ?>
					<?php echo $form->dropDownList($model, 'gender', array("0" => "Female", "1" => "Male")); ?>
					<?php echo $form->error($model, 'gender'); ?>
				</div>
			</div></td>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'birthdate'); ?>
					<?php echo $form->textField($model, 'birthdate', array('maxlength' => 255)); ?>
					<?php echo $form->error($model, 'birthdate'); ?>
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
					<?php echo $form->labelEx($model, 'phone'); ?>
					<?php echo $form->textField($model, 'phone', array('maxlength' => 255)); ?>
					<?php echo $form->error($model, 'phone'); ?>
				</div>
			</div></td>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'email'); ?>
					<?php echo $form->textField($model, 'email', array('maxlength' => 255)); ?>
					<?php echo $form->error($model, 'email'); ?>
				</div>
			</div></td>
	</tr>
</table>
 <div class="one_input wide">
    <div class="rowElem">
    	<?php echo $form->labelEx($model, 'organizations_id'); ?>
    	<?php echo $form->dropDownList($model, 'organizations_id', Organizations::model()->dropDown()); ?>
    	<?php echo $form->error($model, 'organizations_id'); ?>
    	</div>
    </div>
<div class="one_input wide">
    <div class="rowElem" id="alt_organization"  style='display: none;'>
    	<?php echo $form->labelEx($model, 'alt_organization'); ?>
    	<?php echo $form->textField($model, 'alt_organization', array(
    	        'maxlength' => 255, 
    	        'style' => 'width: 200px;', 
    	        'value' => Yii::app()->messages->translate('Participants', 'alt_organization')
    	        )
            ); ?>
    	<?php echo $form->error($model, 'alt_organization'); ?>
    	</div>
    </div>
<div class="ger_title">
	<?php echo $m->translate('Participants', 'report_title'); ?>
</div>
<p>
	<?php echo $m->translate('Participants', 'report_note_p1'); ?>
</p>
<p>
	<?php echo $m->translate('Participants', 'report_note_p2'); ?>
</p>
<div class="one_input member_type">
	<div class="rowElem">
		<?php echo $form->radioButtonList($model, 'participation_type', array(
		        "lecturer" => $m->translate('Participants', 'participation_type_lecturer'),
		        "listner" => $m->translate('Participants', 'participation_type_listner'),
		),
		        array('template' => '{label}{input}', 'separator' => ''));
		?>
		<?php echo $form->error($model, 'participation_type'); ?>
	</div>
</div>
<div class="one_input">
	<div class="rowElem">
		<table class="aricletype">
			<tr height="22">
				<td width="100" valign="top"><?php echo $form->labelEx($model, 'report_type'); ?>
				</td>
				<td><?php echo $form->radioButtonList($model, 'report_type', array(
				        "plenary" => $m->translate('Participants', 'report_type_plenary'),
				        "sessional" => $m->translate('Participants', 'report_type_sessional'),
				), array('template' => '{input}{label}', 'separator' => '</td></tr><tr><td></td><td>'));
				echo $form->error($model, 'report_type'); ?>
				</td>
			</tr>
		</table>
	</div>
</div>
<!-- ------------------------------------------------------------- REPORT FORM PART -->
<div style="display: none;" id="report_form_fields">
	<?php
	for ($i = 0; $i < 2; $i++) {
	    echo $this->renderPartial('application.views.reports._formContent', array(
	            'model' => isset($model->reports[$i]) ? $model->reports[$i] : new Reports(),
	            'form' => $form,
	            'attributeName' => (string)$i,
	    ));
	}
	?>
</div>
<p>
	<?php echo $m->translate('Participants', 'report_note_p3'); ?>
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
		<?php echo $form->dropDownList($model, 'accommodation_places_id', AccommodationPlaces::model()->dropDown()); ?>
		<?php echo $form->error($model, 'accommodation_places_id'); ?>
	</div>
</div>
<div class="one_input wide">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'accommodation_places_rooms_types_id'); ?>
		<?php echo $form->dropDownList($model, 'accommodation_places_rooms_types_id', AccommodationPlacesRoomsTypes::model()->dropDown()); ?>
		<?php echo $form->error($model, 'accommodation_places_rooms_types_id'); ?>
	</div>
</div>
<div class="one_input submit">
	<div class="rowElem">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->messages->translate('Participants', 'register') : 'Save'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
<!-- </form> -->

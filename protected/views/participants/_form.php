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

$cs->registerScript("form_mask",
		"jQuery(function($){ $('#Participants_birthdate').mask('9999-99-99'); });", CClientScript::POS_LOAD);

$cs->registerScript("biethdate_transform",
		'$(\'#Participants_birthdate\').bind("blur", function() {
		if (this.value == \'\') {
		this.value = \'yyyy-mm-dd\';
}
});
		$(\'#Participants_birthdate\').attr("value", "yyyy-mm-dd");', CClientScript::POS_LOAD);

$cs->registerScript("OOOOOOOOOO",
		
"$('#fileupload').fileupload({
		url: 'index.php?r=participants/photoUp',
		sequentialUploads: true
	});
 $('#fileupload').bind('fileuploaddone', function (e, data) {
		$('#photo_upload').hide();
		$('#upload_error').hide();
		var k = data.result.split(',');
		var id = k[0].split(':')[1].replace(/\\\"/g, '');
		var path = k[1].split(':')[1].replace(/[\\\"}\\\\]/g, '');
		
		$('#uploaded_photo').attr('src', path);
		$('#uploaded_photo').show();
		$('#Participants_photo_id').attr('value', id);
	});

 $('#fileupload').bind('fileuploadfail', function (e, data) {
		$('#upload_error').show();
	});", 
		
CClientScript::POS_LOAD);

?>
<h1>
	<?php echo $m->translate('Participants', 'personal_data_title'); ?>
</h1>
<p>
	<?php echo $m->translate('Participants', 'personal_data_note'); ?>
</p>
<?php if (isset($messageWrong) && $messageWrong) { ?>
<p>
	<span style="color: red; font-size: 20px;"><?php echo $m->translate('Participants', 'message_wrong'); ?></span>
</p>
<?php } ?>
<!-- <form action="" class="reg_form"> -->
<table class="personal">
	<tr>
		<td width="360px"><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'name'); ?>
					<?php echo $form->textField($model, 'name', array(
							'maxlength' => 255,
							'placeholder' => $m->translate('Participants', 'name_placeholder'),
							)); ?>
					<?php echo $form->error($model, 'name'); ?>
				</div>
			</div>
		</td>
		<td rowspan="6" width="320px" height="240px">
			<div id="participant_photo">
				<span id='photo_upload'>
					<?php echo $m->translate('Participants', 'pass_card'); ?>
					<input id="ytfileupload" type="hidden" value="" name="fileupload">
					<input id="fileupload" type="file" name="fileupload">
				</span>
				<span id='upload_error' style='display: none;' >
					<?php echo $m->translate('Participants', 'upload_error_placeholder') ?>
				</span>
				<?php echo $form->hiddenField($model, 'photo_id') ?>
				<?php echo $form->error($model, 'photo_id'); ?>
				<img id='uploaded_photo' style='display: none;' src='#'  width="190px" />
			</div>
		</td>
	</tr>
	<tr>
		<td width="360"><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'last_name'); ?>
					<?php echo $form->textField($model, 'last_name', array(
							'maxlength' => 255,
							'placeholder' => $m->translate('Participants', 'last_name_placeholder'),
							)); ?>
					<?php echo $form->error($model, 'last_name'); ?>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td><div class="one_input gender">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'gender'); ?>
					<?php echo $form->dropDownList($model, 'gender', array("0" => "Female", "1" => "Male")); ?>
					<?php echo $form->error($model, 'gender'); ?>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'birthdate'); ?>
					<?php echo $form->textField($model, 'birthdate', array('maxlength' => 255)); ?>
					<?php echo $form->error($model, 'birthdate'); ?>
				</div>
			</div>
		</td>
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
					                'style' => 'display: inline;',
									'placeholder' => $m->translate('Participants', 'contry_placeholder'),
					        ),
					));
					?>
					<?php echo $form->error($model, 'contries_id'); ?>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'cities_id'); ?>
					<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
							'id' => 'cityName',
							'name' => 'cityName',
							'value' => $model->city,
							'source' => $this->createUrl('request/suggestCity'),
							'htmlOptions' => array(
					                'style' => 'display: inline;',
									'placeholder' => $m->translate('Participants', 'city_placeholder'),
					        ),
					));
					?>
					<?php echo $form->error($model, 'cities_id'); ?>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<div class="one_input wide" style="margin: 0; height: 0;">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'organizations_id'); ?>
					<?php echo $form->dropDownList($model, 'organizations_id', Organizations::model()->dropDown()); ?>
					<?php echo $form->error($model, 'organizations_id'); ?>
				</div>
			</div>
			<div class="one_input wide">
				<div class="rowElem" id="alt_organization" style='display: none;'>
					<?php echo $form->labelEx($model, 'alt_organization'); ?>
					<?php echo $form->textField($model, 'alt_organization', array(
							'maxlength' => 255,
							'placeholder' => Yii::app()->messages->translate('Participants', 'alt_organization'),
					)
					); ?>
					<?php echo $form->error($model, 'alt_organization'); ?>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td><div class="one_input">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'phone'); ?>
					<?php echo $form->textField($model, 'phone', array(
							'maxlength' => 255,
							'placeholder' => $m->translate('Participants', 'phone_placeholder'),
							)); ?>
					<?php echo $form->error($model, 'phone'); ?>
				</div>
			</div></td>
		<td><div class="one_input" style="margin-left: -44px;">
				<div class="rowElem">
					<?php echo $form->labelEx($model, 'email'); ?>
					<?php echo $form->textField($model, 'email', array(
							'maxlength' => 255,
							'placeholder' => $m->translate('Participants', 'email_placeholder')
							)); ?>
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
<!-- ------------------------------------------------------------- REPORT FORM PART -->
<div style="display: none;" id="report_form_fields">
	<?php
	for ($i = 0; $i < 2; $i++) {
	    $report = 1;
	    if (isset($model->_reports[$i])) {
	        Yii::log('ParticipantsView::_form:: alternative _report selected');
	        $report = $model->_reports[$i];
	    } else {
	        Yii::log('ParticipantsView::_form:: order report selected');
	        $report = isset($model->reports[$i]) ? $model->reports[$i] : new Reports();
	    }
	    echo $this->renderPartial('application.views.reports._formContent', array(
	            'model' => $report,
	            'form' => $form,
	            'attributeName' => (string)$i,
	    ));
	}
	?>
</div>
<span class="tez"><?php echo $m->translate('Participants', 'report_note_p3'); ?></span>
<!-- ------------------------------------------------------------- REPORT FORM PART -->
<div class="ger_title">
	<?php echo $m->translate('Participants', 'accommodation_title'); ?>
</div>
<p>
	<?php echo $m->translate('Participants', 'accommodation_note'); ?>
</p>
<div class="one_input">
	<div class="rowElem">
		<?php echo $form->labelEx($model, 'need_accomodation'); ?>
		<?php echo $form->checkBox($model, 'need_accomodation'); ?>
		<?php echo $form->error($model, 'need_accomodation'); ?>
	</div>
</div>
<div class="one_input submit">
	<div class="rowElem">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::app()->messages->translate('Participants', 'register') : 'Save'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
<!-- </form> -->

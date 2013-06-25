<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'                   => 'users-form',
    'enableAjaxValidation' => false,
));
$m = Yii::app()->dbMessages;
?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <table width='100%'>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'contries_id'); ?>
            </td>
            <td>
                <?php echo Countries::resolveName($model->contries_id); ?>
                <?php echo $form->hiddenField($model, 'contries_id', array('size' => 60, 'maxlength' => 255)); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'cities_id'); ?>
            </td>
            <td>
                <?php echo Cities::resolveName($model->cities_id); ?>
                <?php echo $form->hiddenField($model, 'cities_id', array('size' => 60, 'maxlength' => 255)); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'name'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'last_name'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'last_name'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'gender'); ?>
            </td>
            <td>
                <?php echo $form->dropDownList($model, 'gender', array(
						"0" => $m->translate('Participants', 'female'), 
						"1" => $m->translate('Participants', 'male'),
					)); 
					?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'birthdate'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'birthdate', 
                		array(
								'size' => 60, 
                				'maxlength' => 255,
								'placeholder' => 'yyyy-mm-dd'
						));
                 ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'organizations_id'); ?>
            </td>
            <td>
                <?php echo $form->dropDownList($model, 'organizations_id', Organizations::model()->dropDown()); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'email'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'phone'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 255)); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'participation_type'); ?>
            </td>
            <td>
                <?php echo $form->dropDownList($model, 'participation_type', array(
    "lecturer" => $m->translate('Participants', 'participation_type_lecturer'),
    "listner"  => $m->translate('Participants', 'participation_type_listner'),
));
?>
            </td>
        </tr>
        <tr>
        	<td>
        		<?php echo $form->labelEx($model, 'need_accomodation'); ?>
        	</td>
        	<td>
				<?php echo $form->checkBox($model, 'need_accomodation'); ?>
        	</td>
        </tr>
    </table>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
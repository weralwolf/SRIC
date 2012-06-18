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
                <?php echo Countries::resolveName($model->contries_id);
                echo $form->hiddenField($model, 'contries_id', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'contries_id'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'cities_id'); ?>
            </td>
            <td>
                <?php echo Cities::resolveName($model->cities_id);
                echo $form->hiddenField($model, 'cities_id', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'cities_id'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'name'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'name'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'second_name'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'second_name', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'second_name'); ?>
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
                <?php echo $form->dropDownList($model, 'gender', array("0" => "Female", "1" => "Male")); ?>
                <?php echo $form->error($model, 'gender'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'birthdate'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'birthdate', array('size' => 60, 'maxlength' => 255)); ?>
                <span class='note'>format: yyyy-mm-dd</span>
                <?php echo $form->error($model, 'birthdate'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'organizations_id'); ?>
            </td>
            <td>
                <?php echo $form->dropDownList($model, 'organizations_id', Organizations::model()->dropDown()); ?>
                <?php echo $form->error($model, 'organizations_id'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'email'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'email'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'phone'); ?>
            </td>
            <td>
                <?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 255)); ?>
                <?php echo $form->error($model, 'phone'); ?>
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
                <?php echo $form->error($model, 'participation_type'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'report_type'); ?>
            </td>
            <td>
                              <?php echo $form->dropDownList($model, 'report_type', array(
    "plenary"   => $m->translate('Participants', 'report_type_plenary'),
    "sessional" => $m->translate('Participants', 'report_type_sessional'),
));
?>
                <?php echo $form->error($model, 'report_type'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'accommodation_places_id'); ?>
            </td>
            <td>
                <?php echo $form->dropDownList($model, 'accommodation_places_id', AccommodationPlaces::model()->dropDown()); ?>
                <?php echo $form->error($model, 'accommodation_places_id'); ?>
            </td>
        </tr>
        <tr>
            <td width='200px'>
                <?php echo $form->labelEx($model, 'accommodation_places_rooms_types_id'); ?>
            </td>
            <td>
                <?php echo $form->dropDownList($model, 'accommodation_places_rooms_types_id', AccommodationPlacesRoomsTypes::model()->dropDown()); ?>
                <?php echo $form->error($model, 'accommodation_places_rooms_types_id'); ?>
            </td>
        </tr>
    </table>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
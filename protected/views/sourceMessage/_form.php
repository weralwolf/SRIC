<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'source-message-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textField($model, 'message', array('size'=>50, 'maxlength'=>256)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>
	
	<?php
	$languages = array_flip(Yii::app()->params['languages']);
	foreach($model->messages as $n => $message) {
	    if (in_array($message->language, Yii::app()->params['languages'])) {
	        $languages[$message->language] = $message;
	    }
	}
	foreach($languages as $language => $message) {
	    if(! ($message instanceof Message)) {
	        $languages[$language] = new Message();
	        $message = $languages[$language];
	        $message->language = $language;
	    }

	    $this->renderPartial('_message', array(
	        'model' => $message,
	        'form' => $form,
	    ));
	}
	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
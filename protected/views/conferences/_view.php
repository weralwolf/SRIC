<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description_texts_id')); ?>:</b>
	<?php echo CHtml::encode($data->description_texts_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_begin')); ?>:</b>
	<?php echo CHtml::encode($data->registration_begin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_end')); ?>:</b>
	<?php echo CHtml::encode($data->registration_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thesesis_begin')); ?>:</b>
	<?php echo CHtml::encode($data->thesesis_begin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thesesis_end')); ?>:</b>
	<?php echo CHtml::encode($data->thesesis_end); ?>
	<br />


</div>
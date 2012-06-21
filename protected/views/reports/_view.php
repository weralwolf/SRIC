<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('participants_id')); ?>:</b>
	<?php echo CHtml::encode($data->participants_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sections_id')); ?>:</b>
	<?php echo CHtml::encode($data->sections_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('files_id')); ?>:</b>
	<?php echo CHtml::encode($data->files_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autors')); ?>:</b>
	<?php echo CHtml::encode($data->autors); ?>
	<br />


</div>
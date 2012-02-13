<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conferences_id')); ?>:</b>
	<?php echo CHtml::encode($data->conferences_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_title')); ?>:</b>
	<?php echo CHtml::encode($data->menu_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order')); ?>:</b>
	<?php echo CHtml::encode($data->order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texts_id')); ?>:</b>
	<?php echo CHtml::encode($data->texts_id); ?>
	<br />


</div>
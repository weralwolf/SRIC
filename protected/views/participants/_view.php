<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('approved')); ?>:</b>
	<?php echo CHtml::encode($data->approved ? 'Yes' : 'No'); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conferences_id')); ?>:</b>
	<?php echo CHtml::encode($data->conferences_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contries_id')); ?>:</b>
	<?php echo CHtml::encode($data->contries_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cities_id')); ?>:</b>
	<?php echo CHtml::encode($data->cities_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('second_name')); ?>:</b>
	<?php echo CHtml::encode($data->second_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthdate')); ?>:</b>
	<?php echo CHtml::encode($data->birthdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organizations_id')); ?>:</b>
	<?php echo CHtml::encode($data->organizations_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post')); ?>:</b>
	<?php echo CHtml::encode($data->post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('participation_type')); ?>:</b>
	<?php echo CHtml::encode($data->participation_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('report_type')); ?>:</b>
	<?php echo CHtml::encode($data->report_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sections_id')); ?>:</b>
	<?php echo CHtml::encode($data->sections_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accommodation_places_id')); ?>:</b>
	<?php echo CHtml::encode($data->accommodation_places_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accommodation_places_rooms_types_id')); ?>:</b>
	<?php echo CHtml::encode($data->accommodation_places_rooms_types_id); ?>
	<br />

	*/ ?>

</div>
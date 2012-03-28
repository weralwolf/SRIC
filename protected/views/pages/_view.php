<div class="row">
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
</div>
<div class="row">
    <b><?php echo CHtml::encode($data->getAttributeLabel('order')); ?>:</b>
    <?php echo CHtml::encode($data->order); ?>
</div>

<div class="row">
	<?php Yii::app()->dbMessages->translate("Pages", $model->title->message); ?>
</div>
<div class="row">
    <?php Yii::app()->dbMessages->translate("Pages", $data->content->message); ?>
</div>

<?php
$blind = !(isset($blind) && !$blind); 
if (!$blind) {?>
<div class="row">
    (<i><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</i>
    <?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id' => $model->id)); ?>; 
    <i><?php echo CHtml::encode($model->getAttributeLabel('order')); ?>:</i>
    <?php echo CHtml::encode($model->order); ?>)
</div>

<h1><?php echo Yii::app()->dbMessages->translate("Pages", $model->title->message); ?></h1>
<?php } ?>
<div class="row">
    <?php echo Yii::app()->dbMessages->translate("Pages", $model->content->message); ?>
</div>

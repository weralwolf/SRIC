<?php
$this->breadcrumbs=array(
	'Participants'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Participants', 'url'=>array('index')),
	array('label'=>'Create Participants', 'url'=>array('create')),
	array('label'=>'View Participants', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Participants', 'url'=>array('admin')),
);
?>

<h1>Update Participants <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_formUpdate', array('model'=>$model)); ?>
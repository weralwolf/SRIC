<?php
$this->breadcrumbs=array(
	'Conferences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Conferences', 'url'=>array('index')),
	array('label'=>'Create Conferences', 'url'=>array('create')),
	array('label'=>'View Conferences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Conferences', 'url'=>array('admin')),
);
?>

<h1>Update Conferences <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
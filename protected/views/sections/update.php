<?php
$this->breadcrumbs=array(
	'Sections'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sections', 'url'=>array('index')),
	array('label'=>'Create Sections', 'url'=>array('create')),
	array('label'=>'View Sections', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sections', 'url'=>array('admin')),
);
?>

<h1>Update Sections <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
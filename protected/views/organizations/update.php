<?php
$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Organizations', 'url'=>array('index')),
	array('label'=>'Create Organizations', 'url'=>array('create')),
	array('label'=>'View Organizations', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Organizations', 'url'=>array('admin')),
);
?>

<h1>Update Organizations <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->breadcrumbs=array(
	'Countries'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Countries', 'url'=>array('index')),
	array('label'=>'Create Countries', 'url'=>array('create')),
	array('label'=>'View Countries', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Countries', 'url'=>array('admin')),
);
?>

<h1>Update '<i><?php echo $model->name; ?></i>'</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Organizations', 'url'=>array('index')),
	array('label'=>'Create Organizations', 'url'=>array('create')),
	array('label'=>'Update Organizations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Organizations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Organizations', 'url'=>array('admin')),
);
?>

<h1>View Organizations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cities_id',
		'title',
		'approved',
	),
)); ?>

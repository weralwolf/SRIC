<?php
$this->breadcrumbs=array(
	'Cities'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Cities', 'url'=>array('index')),
	array('label'=>'Create Cities', 'url'=>array('create')),
	array('label'=>'Update Cities', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cities', 'url'=>array('admin')),
);
?>

<h1>View Cities #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'countries_id',
		'name',
		'approved',
	),
)); ?>

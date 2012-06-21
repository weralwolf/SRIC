<?php
$this->breadcrumbs=array(
	'Reports'=>array('admin'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Reports', 'url'=>array('index')),
	array('label'=>'Create Reports', 'url'=>array('create')),
	array('label'=>'Update Reports', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reports', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reports', 'url'=>array('admin')),
);
?>

<h1>View Reports #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'participants_id',
		'sections_id',
		'files_id',
		'title',
		'autors',
	),
)); ?>

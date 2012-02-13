<?php
$this->breadcrumbs=array(
	'Texts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Texts', 'url'=>array('index')),
	array('label'=>'Create Texts', 'url'=>array('create')),
	array('label'=>'Update Texts', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Texts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Texts', 'url'=>array('admin')),
);
?>

<h1>View Texts #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
	),
)); ?>

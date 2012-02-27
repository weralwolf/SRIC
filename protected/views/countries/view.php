<?php
$this->breadcrumbs=array(
	'Countries'=>array('admin'),
	$model->name,
);
/*
$this->menu=array(
	array('label'=>'List Countries', 'url'=>array('index')),
	array('label'=>'Create Countries', 'url'=>array('create')),
	array('label'=>'Update Countries', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Countries', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Countries', 'url'=>array('admin')),
);
*/
?>

<h1><i><?php echo $model->name; ?></i></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		    'name' => 'name',
		    'value' => "[{$model->id}] {$model->name}"
		),
		array(
		    'name' => 'approved',
		    'value' => $model->approved ? "Yes" : "No"
		),
	),
)); ?>

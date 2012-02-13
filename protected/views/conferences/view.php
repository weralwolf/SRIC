<?php
$this->breadcrumbs=array(
	'Conferences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Conferences', 'url'=>array('index')),
	array('label'=>'Create Conferences', 'url'=>array('create')),
	array('label'=>'Update Conferences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Conferences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Conferences', 'url'=>array('admin')),
);
?>

<h1>View Conferences #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description_texts_id',
		'registration_begin',
		'registration_end',
		'thesesis_begin',
		'thesesis_end',
	),
)); ?>

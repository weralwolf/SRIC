<?php
$this->breadcrumbs=array(
	'Accommodation Places'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List AccommodationPlaces', 'url'=>array('index')),
	array('label'=>'Create AccommodationPlaces', 'url'=>array('create')),
	array('label'=>'Update AccommodationPlaces', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccommodationPlaces', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccommodationPlaces', 'url'=>array('admin')),
);
?>

<h1>View AccommodationPlaces #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'conferences_id',
		'title',
		'description',
	),
)); ?>

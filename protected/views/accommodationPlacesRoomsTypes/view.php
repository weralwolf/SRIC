<?php
$this->breadcrumbs=array(
	'Accommodation Places Rooms Types'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List AccommodationPlacesRoomsTypes', 'url'=>array('index')),
	array('label'=>'Create AccommodationPlacesRoomsTypes', 'url'=>array('create')),
	array('label'=>'Update AccommodationPlacesRoomsTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccommodationPlacesRoomsTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccommodationPlacesRoomsTypes', 'url'=>array('admin')),
);
?>

<h1>View AccommodationPlacesRoomsTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'conferences_id',
		'title',
	),
)); ?>

<?php
$this->breadcrumbs=array(
	'Accommodation Places Rooms Types'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccommodationPlacesRoomsTypes', 'url'=>array('index')),
	array('label'=>'Create AccommodationPlacesRoomsTypes', 'url'=>array('create')),
	array('label'=>'View AccommodationPlacesRoomsTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccommodationPlacesRoomsTypes', 'url'=>array('admin')),
);
?>

<h1>Update AccommodationPlacesRoomsTypes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
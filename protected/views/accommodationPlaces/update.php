<?php
$this->breadcrumbs=array(
	'Accommodation Places'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccommodationPlaces', 'url'=>array('index')),
	array('label'=>'Create AccommodationPlaces', 'url'=>array('create')),
	array('label'=>'View AccommodationPlaces', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccommodationPlaces', 'url'=>array('admin')),
);
?>

<h1>Update AccommodationPlaces <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
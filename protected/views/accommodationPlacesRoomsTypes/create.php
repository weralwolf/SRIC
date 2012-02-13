<?php
$this->breadcrumbs=array(
	'Accommodation Places Rooms Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccommodationPlacesRoomsTypes', 'url'=>array('index')),
	array('label'=>'Manage AccommodationPlacesRoomsTypes', 'url'=>array('admin')),
);
?>

<h1>Create AccommodationPlacesRoomsTypes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
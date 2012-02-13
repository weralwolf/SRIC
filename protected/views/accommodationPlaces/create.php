<?php
$this->breadcrumbs=array(
	'Accommodation Places'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccommodationPlaces', 'url'=>array('index')),
	array('label'=>'Manage AccommodationPlaces', 'url'=>array('admin')),
);
?>

<h1>Create AccommodationPlaces</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
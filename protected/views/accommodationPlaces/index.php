<?php
$this->breadcrumbs=array(
	'Accommodation Places',
);

$this->menu=array(
	array('label'=>'Create AccommodationPlaces', 'url'=>array('create')),
	array('label'=>'Manage AccommodationPlaces', 'url'=>array('admin')),
);
?>

<h1>Accommodation Places</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

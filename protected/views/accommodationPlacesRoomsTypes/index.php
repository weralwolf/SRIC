<?php
$this->breadcrumbs=array(
	'Accommodation Places Rooms Types',
);

$this->menu=array(
	array('label'=>'Create AccommodationPlacesRoomsTypes', 'url'=>array('create')),
	array('label'=>'Manage AccommodationPlacesRoomsTypes', 'url'=>array('admin')),
);
?>

<h1>Accommodation Places Rooms Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

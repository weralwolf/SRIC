<?php
$this->breadcrumbs=array(
	'Cities',
);

$this->menu=array(
	array('label'=>'Create Cities', 'url'=>array('create')),
	array('label'=>'Manage Cities', 'url'=>array('admin')),
);
?>

<h1>Cities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

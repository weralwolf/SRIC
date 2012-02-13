<?php
$this->breadcrumbs=array(
	'Conferences',
);

$this->menu=array(
	array('label'=>'Create Conferences', 'url'=>array('create')),
	array('label'=>'Manage Conferences', 'url'=>array('admin')),
);
?>

<h1>Conferences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
$this->breadcrumbs=array(
	'Organizations',
);

$this->menu=array(
	array('label'=>'Create Organizations', 'url'=>array('create')),
	array('label'=>'Manage Organizations', 'url'=>array('admin')),
);
?>

<h1>Organizations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
$this->breadcrumbs=array(
	'Sections',
);

$this->menu=array(
	array('label'=>'Create Sections', 'url'=>array('create')),
	array('label'=>'Manage Sections', 'url'=>array('admin')),
);
?>

<h1>Sections</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
$this->breadcrumbs=array(
	'Files',
);

$this->menu=array(
	array('label'=>'Create Files', 'url'=>array('create')),
	array('label'=>'Manage Files', 'url'=>array('admin')),
);
?>

<h1>Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

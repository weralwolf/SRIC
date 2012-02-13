<?php
$this->breadcrumbs=array(
	'Texts',
);

$this->menu=array(
	array('label'=>'Create Texts', 'url'=>array('create')),
	array('label'=>'Manage Texts', 'url'=>array('admin')),
);
?>

<h1>Texts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

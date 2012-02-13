<?php
$this->breadcrumbs=array(
	'Conferences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Conferences', 'url'=>array('index')),
	array('label'=>'Manage Conferences', 'url'=>array('admin')),
);
?>

<h1>Create Conferences</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
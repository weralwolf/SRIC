<?php
$this->breadcrumbs=array(
	'Texts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Texts', 'url'=>array('index')),
	array('label'=>'Manage Texts', 'url'=>array('admin')),
);
?>

<h1>Create Texts</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
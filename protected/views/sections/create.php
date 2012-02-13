<?php
$this->breadcrumbs=array(
	'Sections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sections', 'url'=>array('index')),
	array('label'=>'Manage Sections', 'url'=>array('admin')),
);
?>

<h1>Create Sections</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
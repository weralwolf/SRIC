<?php
$this->breadcrumbs=array(
	'Texts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Texts', 'url'=>array('index')),
	array('label'=>'Create Texts', 'url'=>array('create')),
	array('label'=>'View Texts', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Texts', 'url'=>array('admin')),
);
?>

<h1>Update Texts <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
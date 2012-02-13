<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
	array('label'=>'Create Files', 'url'=>array('create')),
	array('label'=>'View Files', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Files', 'url'=>array('admin')),
);
?>

<h1>Update Files <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
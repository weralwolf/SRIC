<?php
$this->breadcrumbs=array(
	'Report Authors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReportAuthors', 'url'=>array('index')),
	array('label'=>'Create ReportAuthors', 'url'=>array('create')),
	array('label'=>'View ReportAuthors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReportAuthors', 'url'=>array('admin')),
);
?>

<h1>Update ReportAuthors <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
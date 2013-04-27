<?php
$this->breadcrumbs=array(
	'Report Authors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReportAuthors', 'url'=>array('index')),
	array('label'=>'Manage ReportAuthors', 'url'=>array('admin')),
);
?>

<h1>Create ReportAuthors</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
$this->breadcrumbs=array(
        'Source Messages'=>array('index'),
        $model->id=>array('view','id'=>$model->id),
        'Update',
);

$this->menu=array(
        array('label'=>'List SourceMessage', 'url'=>array('index')),
        array('label'=>'Create SourceMessage', 'url'=>array('create')),
        array('label'=>'View SourceMessage', 'url'=>array('view', 'id'=>$model->id)),
        array('label'=>'Manage SourceMessage', 'url'=>array('admin')),
);
?>

<h1>
	Update SourceMessage
	<?php echo $model->id; ?>
</h1>

<?php echo $this->renderPartial('application.views.sourceMessage._form', array(
        'model'=>$model,
        'textArea' => isset($textArea) ? $textArea : true,
        'category' => isset($category) && !empty($category) ? $category : ''
));
?>
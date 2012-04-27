<?php
$this->breadcrumbs=array(
        'Source Messages'=>array('index'),
        'Create',
);

$this->menu=array(
        array('label'=>'List SourceMessage', 'url'=>array('index')),
        array('label'=>'Manage SourceMessage', 'url'=>array('admin')),
);
?>

<h1>Create `<?php echo isset($category) && !empty($category) ? $category : 'SourceMessage'?>`</h1>

<?php echo $this->renderPartial('application.views.sourceMessage._form', array(
        'model'=>$model,
        'textArea' => isset($textArea) ? $textArea : true,
        'category' => isset($category) && !empty($category) ? $category : ''
));
?>
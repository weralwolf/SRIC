<?php
$this->breadcrumbs=array(
	'Source Messages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SourceMessage', 'url'=>array('index')),
	array('label'=>'Create SourceMessage', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('source-message-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?><br />
<?php echo CHtml::link('New', isset($creationURl) ? $creationURl : array('sourceMessage/create')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('application.views.sourceMessage._search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'source-message-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category',
		'message',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

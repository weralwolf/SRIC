<?php
$this->breadcrumbs=array(
	'Participants'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Participants', 'url'=>array('index')),
	array('label'=>'Create Participants', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('participants-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Participants</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'participants-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'approved',
		'contries_id',
		'cities_id',
		'name',
		/*
		'second_name',
		'last_name',
		'gender',
		'birthdate',
		'organizations_id',
		'post',
		'email',
		'phone',
		'participation_type',
		'report_type',
		'sections_id',
		'accommodation_places_id',
		'accommodation_places_rooms_types_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

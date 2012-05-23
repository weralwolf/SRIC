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
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>,
	<b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the
	beginning of each of your search values to specify how the comparison
	should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
	<?php $this->renderPartial('_search',array(
	        'model'=>$model,
)); ?>
</div>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'participants-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=>array(
                array(
                        'name' => 'name',
                        //'label' => '`' . Yii::app()->messages->translate('Participants', 'last_name') . '` `' .
                        //Yii::app()->messages->translate('Participants', 'name') . '` `' .
                        //Yii::app()->messages->translate('Participants', 'second_name') . '`',
                        'value' => '$data->last_name . " " . $data->name . " " . $data->second_name',
                ),
                array(
                        'name' => 'organizations_id',
                        //'label' => Yii::app()->messages->translate('Participants', 'organizations_id'),
                        'value' => 'Organizations::resolveName($data->organizations_id)',
                ),
                array(
                        'name' => 'contries_id',
                        //'label' => '`' . Yii::app()->messages->translate('Participants', 'countries_id') . '`, `' .
                        //Yii::app()->messages->translate('Participants', 'cities_id') . '`',
                        'value' => 'Organizations::resolveName($data->contries_id) . "-" . Organizations::resolveName($data->cities_id)'
                ),
                array(
                        'name' => 'report_type',
                        //'label' => Yii::app()->messages->translate('Participants', 'report_type'),
                        'value' => 'Yii::app()->dbMessages->translate(\'Participants\', \'report_type_\' . $data->report_type)',
                ),

                array(
                        'name' => 'report',
                        'value' => '$data->reportsButtons()',
                ),

                array(
                        'class'=>'CButtonColumn',
                ),
        ),
)); ?>

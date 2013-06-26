<?php
$this->breadcrumbs=array(
        'Participants'=>array('index'),
        'Manage',
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
<br /><br />
Sections list for chairs:
<br />
<?php foreach (Sections::listForChairsLinks() as $link) {
	echo '(' . CHtml::link('table', $link['turl']) . ') ' . CHtml::link($link['label'], $link['url']) . '<br />';
}?>
<br /><br />
<?php echo CHtml::link('Email (print)', array('participants/email')); ?>
<br />
<?php echo CHtml::link('List (print)', array('participants/list')); ?>
<br />
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
	<?php $this->renderPartial('_search',array(
	        'model'=>$model,
)); ?>
</div>
<!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'participants-grid',
        #'enablePagination' => false,
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
                        'value' => 'Countries::resolveName($data->contries_id) . "-" . Cities::resolveName($data->cities_id)'
                ),
                 array(
                        'name' => 'section',
                        'value' => '$data->resolveSections()',
                ),
                array(
                        'name' => 'repo',
                        'value' => '$data->participationState()',
                ),
        		/*
                array(
                        'name' => 'report',
                        'value' => '$data->reportsButtons()',
                ),
				*/
                array(
                        'class'=>'CButtonColumn',
                ),
        ),
)); ?>

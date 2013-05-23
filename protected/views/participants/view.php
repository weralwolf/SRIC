<?php
$this->breadcrumbs=array(
        'Participants'=>array('index'),
        $model->name,
);

$this->menu=array(
        array('label'=>'List Participants', 'url'=>array('index')),
        array('label'=>'Create Participants', 'url'=>array('create')),
        array('label'=>'Update Participants', 'url'=>array('update', 'id'=>$model->id)),
        array('label'=>'Delete Participants', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>'Manage Participants', 'url'=>array('admin')),
);
?>

<h1>
	View Participants #
	<?php echo $model->id; ?>
</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
        'data'=>$model,
        'attributes'=>array(
                'id',
                array('label' => Yii::app()->messages->translate('Participants', 'approved'),
                        'type' => 'raw',
                        'value' => $model->approved ? 'Yes' : 'No'
                ),
                array('label' => Yii::app()->messages->translate('Participants', 'contries_id'),
                        'type' => 'raw',
                        'value' => Countries::resolveName($model->contries_id)
                ),
                array('label' => Yii::app()->messages->translate('Participants', 'cities_id'),
                        'type' => 'raw',
                        'value' => Cities::resolveName($model->cities_id)
                ),
                'name',
                'last_name',
                array('label' => Yii::app()->messages->translate('Participants', 'gender'),
                        'type' => 'raw',
                        'value' => $model->gender ? 'Male' : 'Female'
                ),
                'birthdate',
                array('label' => Yii::app()->messages->translate('Participants', 'organizations_id'),
                        'type' => 'raw',
                        'value' => Organizations::resolveName($model->organizations_id)
                ),
                'email',
                'phone',
        		array('label' => Yii::app()->messages->translate('Participants', 'participation_type'),
        				'type' => 'raw',
        				'value' => Yii::app()->dbMessages->translate('Participants', 'participation_type_' . $model->participation_type),
        		),
        ),
)); 
if (count($model->reports)) {
	foreach ($model->reports as $report) {
		echo "<hr />";
		$this->widget('zii.widgets.CDetailView', array(
			'data'=>$report,
			'attributes'=>array(
					'id',
					array('label' => Yii::app()->messages->translate('Reports', 'sections_id'),
							'type' => 'raw',
							'value' => Sections::resolveName($report->sections_id)
					),
					array('label' => Yii::app()->messages->translate('Reports', 'type'),
							'type' => 'raw',
							'value' => Yii::app()->messages->translate('Reports', 'type_' . $report->type),
					),
					'title',
					array('label' => Yii::app()->messages->translate('Reports', 'description'),
							'type' => 'html',
							'value' => '<pre>' . $report->description . '</pre>',
					),
			),
		));
	}
}
?>


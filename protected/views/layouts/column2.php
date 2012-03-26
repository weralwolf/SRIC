<?php $this->beginContent('//layouts/main'); ?>

<div id="content">
	<div class="left_col">
	<?php 
	$items = array(
			array('label' => Yii::t("MenuLinks", "info"), 'url'=>array('/conferences/info')),
			array('label' => Yii::t("MenuLinks", "registration"), 'url'=>array('/conferences/reg')),
			array('label' => Yii::t("MenuLinks", "abstracts"), 'url'=>array('/conferences/abs')),
			array('label' => Yii::t("MenuLinks", "program"), 'url'=>array('/conferences/prog')),
			array('label' => Yii::t("MenuLinks", "location"), 'url'=>array('/conferences/loc')),
			array('label' => Yii::t("MenuLinks", "accommodation"), 'url'=>array('/conferences/acc')),
			array('label' => Yii::t("MenuLinks", "committees"), 'url'=>array('/conferences/comm')),
			
		);
	$this->widget('zii.widgets.CMenu',array(
		'items' => $items,
	    'activeCssClass' => 'active',
		'htmlOptions' => array('class' => 'side_menu'),
	));
	?>
</div>
<div class="right_col">
<?php echo $content; ?>
</div>
<div style="clear:both"></div>
</div><!-- content -->
<?php $this->endContent(); ?>
<?php $this->beginContent('//layouts/main'); ?>

<div id="content">
	<?php if (Pages::menuLinkActive()) {?>
	<div class="left_col">
		<?php 
		$this->widget('zii.widgets.CMenu',array(
		        'items' => Pages::sideMenu(),
		        'activeCssClass' => 'active',
		        'htmlOptions' => array('class' => 'side_menu'),
		));
		?>
	</div>
	<div class="right_col">
		<?php echo $content; ?>
	</div>
	<div style="clear: both"></div>
	<?php } else {?>
	<?php echo $content; ?>
	<?php }?>
</div>
<!-- content -->
<?php $this->endContent(); ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
	<div class="left_col">
    <ul class="side_menu">
        <li><a href="#">информация</a></li>
        <li class="active"><a href="#">регистрация</a></li>
        <li><a href="#">тезисы</a></li>
        <li><a href="#">программа</a></li>
        <li class="two_rows"><a href="#">место проведения</a></li>
        <li><a href="#">проживание</a></li>
        <li><a href="#">комитеты</a></li>
    </ul>
</div>
<div class="right_col">
<?php echo $content; ?>
</div>
<div style="clear:both"></div>
</div><!-- content -->
<?php $this->endContent(); ?>
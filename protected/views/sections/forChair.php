<b><?php Sections::resolveName($models->id) ?>
</b>
<hr />
<?php foreach ($models->reports as $report) {?>
<?php if (!$report->participant) continue; ?>
<span class="report type"><?php echo Yii::app()->messages->translate('Reports', 'type_' . $report->type) ?>
</span>
<br />

<span class="report title"><?php echo $report->title ?> </span>
<br />

<!-- <span class="report reporter_name"><?php echo $report->participant->name . '. ' . 
	$report->participant->last_name ?></span><br /> -->
<span class="report reporter_email"><?php echo $report->participant->email ?>
</span>
<br />

<div class="report coauthors">
	<?php 
	foreach ($report->coauthors as $co) {
	$auth = explode(',', $co->authors);
	$re_auth = array();	
	foreach ($auth as $c) {
		if (strpos($c, $report->participant->last_name) === TRUE
		 && strpos($c, $report->participant->name[0]. '.') === TRUE) {
			$re_auth[] = '<ul>' . $c . '</ul>';
		} else {
			$re_auth[] = $c;
		}
	}
	echo implode(', ', $re_auth) . '(' . $co->department . ')<br />';
} ?>
</div>

<div style="100%">
<pre>
	<?php echo $report->description ?>
</pre>
</div>
<hr />
<?php } ?>
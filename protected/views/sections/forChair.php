<h1><b><?php echo Sections::resolveName($models->id) ?>
</b></h1>
<hr />
<?php foreach ($models->reports as $report) {?>
<?php if (!$report->participant) continue; ?>
<span class="report type"><?php echo Yii::app()->messages->translate('Reports', 'type_' . $report->type) ?>
</span>
<br />

<h3 style="text-transform:uppercase;"><span class="report title"><?php echo $report->title ?> </span></h3>
<br />

<i><span class="report reporter_name"><?php echo mb_substr($report->participant->name, 0, 1, 'utf-8') . '. ' . 
	$report->participant->last_name ?></span> (<?php echo Organizations::resolveName($report->participant->organizations_id) ?>)<br />
<span class="report reporter_email"><?php echo $report->participant->email ?>
</span></i>
<br />
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
	echo implode(', ', $re_auth) . ' (' . $co->department . ')<br />';
} ?>
</div>
<br />

<div style="width: 100%">
<pre>
	<?php echo $report->description ?>
</pre>
</div>
<hr />
<?php } ?>
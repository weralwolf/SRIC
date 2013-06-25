<b><?php echo $models->message ?></b>
<hr />
<?php foreach ($models->reports as $report) {?>
<?php if (!$report->participant) continue; ?>
<span class="report type" ><?php echo $report->type ?></span><br />

<span class="report title"><?php echo $report->title ?></span><br />

<span class="report reporter_name"><?php echo $report->participant->name . '. ' . 
	$report->participant->last_name ?></span><br />
<span class="report reporter_email"><?php echo $report->participant->email ?></span><br />

<div class="report coauthors">
<?php foreach ($report->coauthors as $co) {?>
	<?php echo $co->authors . '(' . $co->department . ')'?><br />
<?php } ?>
</div>

<pre><?php echo $report->description ?></pre>
<hr />
<?php } ?>
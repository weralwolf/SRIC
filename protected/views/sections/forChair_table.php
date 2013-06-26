<style>
table, th, td
{
	border: 1px solid black;
	border-spacing:0;
	border-collapse:collapse;
}

</style>
<h1><b><?php echo Sections::resolveName($models->id) ?>
<table style="width: 100%;">
<thead>
	<tr>
		<th>Ім’я доповідача</th>
		<th>Тривалість доповіді</th>
		<th>Назва доповіді</th>
		<th>Email доповідача</th>
	</tr>
</thead>
<tbody>
<?php foreach ($models->reports as $report) {?>
<?php if (!$report->participant) continue; ?>
	<tr>
		<td><?php echo $report->participant->name . ' ' . $report->participant->last_name ?></td>
		<td><?php echo Yii::app()->messages->translate('Reports', 'type_' . $report->type) ?></td>
		<td><span style="text-transform:uppercase;"><?php echo $report->title ?> </span></td>
		<td><?php echo $report->participant->email ?></td>
	</tr>
<?php } ?>
</tbody>
</table>
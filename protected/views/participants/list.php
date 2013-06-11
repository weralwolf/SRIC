<style>
<!--
table {
  max-width: 100%;
  background-color: transparent;
  border-collapse: collapse;
  border-spacing: 0;
}
.table {
  width: 100%;
  margin-bottom: 20px;
}
.table th,
.table td {
  padding: 8px;
  line-height: 20px;
  text-align: left;
  vertical-align: top;
  border-top: 1px solid #dddddd;
}
.table th {
  font-weight: bold;
}
.table thead th {
  vertical-align: bottom;
}
.table tbody + tbody {
  border-top: 2px solid #dddddd;
}
.table .table {
  background-color: #ffffff;
}
.table tbody tr.success > td {
  background-color: #dff0d8;
}
.table tbody tr.error > td {
  background-color: #f2dede;
}
.table tbody tr.warning > td {
  background-color: #fcf8e3;
}
.table tbody tr.info > td {
  background-color: #d9edf7;
}
-->
</style>

<?php
$current_country = -1;
$current_city = -1;
$currnt_org = -1;
?>
<table width="100%" class="table">
	<?php
	foreach ($models as $model) {
		if ($model->contries_id != $current_country) {
		    ?> <tr><td colspan="8" style="text-align: center;"><b>
		    <?php echo Countries::resolveName($model->contries_id); ?>
		    </b></td></tr> <?php
			$current_country = $model->contries_id;
// 			continue;
		}
		
		if ($model->cities_id != $current_city) {
			?> <tr><td colspan="8" style="text-align: center;"><i>
		    <?php echo Cities::resolveName($model->cities_id); ?>
		    </i></td></tr> <?php
			$current_city = $model->cities_id;
// 			continue;
		}

		if ($model->organizations_id != $currnt_org) {
			?> <tr><td colspan="8" style="text-align: center;"><u>
		    <?php echo Cities::resolveName($model->organizations_id); ?>
		    </u></td></tr> <?php
			$currnt_org = $model->organizations_id;
// 			continue;
		}
		$rowspan = "";
		if (count($model->reports) == 2) {
			$rowspan = " rowspan='2'";
		}
		?>
		<tr>
			<td<?php echo $rowspan; ?>><?php echo $model->name . ' ' .
							$model->last_name ?></td>
			<td<?php echo $rowspan; ?>><?php echo $model->birthdate; ?></td>
			<?php if (count($model->reports)) {?>
			<td><?php echo Sections::resolveName($model->reports[0]->sections_id); ?></td>
			<td><?php echo $model->reports[0]->type; ?></td>
			<td><?php echo $model->reports[0]->title; ?></td>
			<?php } else { ?>
			<td colspan="3">No reports</td>
			<?php }?>
			<td<?php echo $rowspan; ?>><?php echo $model->phone; ?></td>
			<td<?php echo $rowspan; ?>><?php echo $model->email; ?></td>
			<td<?php echo $rowspan; ?>>how</td>
		</tr>
		<?php if (count($model->reports) == 2) { ?>
			<td><?php echo Sections::resolveName($model->reports[1]->sections_id); ?></td>
			<td><?php echo $model->reports[1]->type; ?></td>
			<td><?php echo $model->reports[1]->title; ?></td>
		<?php } ?>
	<?php }	?>
</table>
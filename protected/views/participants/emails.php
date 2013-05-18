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

<table width="100%" class="table">
<thead>
	<tr>
		<th>Name</th>
		<th>email</th>
	</tr>
</thead>
<tbody>
	<?php foreach($models as $model) {?>
		<tr>
			<td><?php echo implode(' ', array(
                    $model->name,
                    $model->second_name,
                    $model->last_name
                )); ?></td>
            <td><?php echo $model->email; ?></td>
		</tr>
	<?php }?>
</tbody>
</table>
<?php 
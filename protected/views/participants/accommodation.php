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
    margin-bottom: 18px;
}

.table th,.table td {
    padding: 8px;
    line-height: 18px;
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

.table caption+thead tr:first-child th,.table caption+thead tr:first-child td,.table colgroup+thead tr:first-child th,.table colgroup+thead tr:first-child td,.table thead:first-child tr:first-child th,.table thead:first-child tr:first-child td
    {
    border-top: 0;
}

.table tbody+tbody {
    border-top: 2px solid #dddddd;
}
-->
</style>
<center><h1><u>Побажання на поселення</u></h1></center>
<table class='table'>
    <tbody>
<?php
$place = -1;
foreach ($models as $model) {
    if ($place != $model->place->id) { ?>
<?php if ($place =! -1) echo "\t\t</tbody>\n\t</table>\n"; ?>
<tr><td colspan='4'><h2><b><u><?php echo $model->place->t(); ?></u></b></h2></td></tr>
        <tr style='background-color: #CCC;'>
            <th>ПІБ</th>
            <th>Тип кімнати</th>
            <th>Дати перебування</th>
            <th>Необхід. зустрічі</th>
        </tr>
<?php
    $place = $model->place->id;
    } ?>
        <tr>
            <td><b><?php echo $model->last_name; ?></b> <?php echo $model->name . ' ' . $model->second_name?></td>
            <td><?php echo $model->room_type->t()?></td>
            <td></td>
            <td></td>
        </tr>
<?php } ?>
    </tbody>
</table>
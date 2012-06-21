<?php
echo '<b>';
echo CHtml::link('[e]', array(
    'reports/update',
    'id' => $report_id
));
echo '</b> ';
echo CHtml::link(isset($title) ? $title : $model->original_name, array(
    'files/download',
    'id' => $model->id
));
?>
<br />
<br />
<?php foreach ($models as $i => $model) { ?>
    <h1><b><?php echo $model->t(); ?></b></h1>
    <?php foreach ($model->reports as $report) { ?>
        <?php if (is_null($report->participant)) continue;?>
        <div>
            <u><b>
            <?php echo implode(' ', array(
                    $report->participant->name,
                    $report->participant->second_name,
                    $report->participant->last_name
                )); ?>
            </b></u>
            <td><?php echo $report->title ?></td>
        </div>
    <?php } ?>
<?php } ?>
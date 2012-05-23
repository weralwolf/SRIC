<?php
echo CHtml::link(
        $model->original_name,
        array(
                'files/download',
                'id' => $model->id
        )
); ?>
<br />

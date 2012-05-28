<?php
echo CHtml::link(
        isset($title) ? $title : $model->original_name,
        array(
                'files/download',
                'id' => $model->id
        )
); ?>
<br />

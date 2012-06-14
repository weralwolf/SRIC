<p>Таблица формируется автоматически после регистрации участников. Т.о. она может быть изменена после принятия
    докладов.</p>
<div class="sections">
<?php
foreach ($models as $index => $model) {
    echo $this->renderPartial('_sectionProgramm', array(
        'model' => $model,
        'index' => $index + 1,
    ));
}
?>
</div>
<div class="one_section_outer">
    <div class="sect_label">секция <?php echo $index?></div>
    <div class="one_section closed">
        <div class="sect_header">
            <h2><?php echo $model->t() ?></h2>
        </div>
        <div class="toggle_button">показать</div>
        <div class="sect_body">
            <div class="sect_about">(в том числе Солнца, солнечно-земных связей, магнитосферы, ионосферы и
                т.д.)</div>
            <div class="one_row_outer">
                <table class="head_row">
                    <tr>
                        <td>фамилия, имя, отчество</td>
                        <td>название доклада</td>
                        <td>институт, город, страна</td>
                        <td>авторы</td>
                        <td>тип доклада</td>
                    </tr>
                </table>
            </div>
            <?php foreach ($model->reports as $n => $report) {
            if (is_null($report) || is_null($report->participant)) continue;?>
                <div class="one_row_outer<?php echo $n + 1 <  count($model->reports) ? '' : ' last';?>">
                    <table class="one_row">
                        <tr>
                            <td>
                                <?php
                                    echo implode(' ', array(
                                        $report->participant->name,
                                        $report->participant->second_name,
                                        $report->participant->last_name
                                    ));
                                ?>
                            </td>
                            <td><?php echo $report->title ?></td>
                            <td>
                                <?php
                                    echo implode(', ', array(
#                                        $report->participant->organization->t(),
#                                        $report->participant->city->t(),
#                                        $report->participant->country->t()
                                    ));
                                ?>
                            </td>
                            <td><?php echo $report->autors ?></td>
                            <td>
                            <?php
                            echo Yii::app()->dbMessages->translate('Participants', 'report_type_' . $report->participant->report_type);
                            ?>
                            </td>
                        </tr>
                    </table>
                </div>
            <?php } ?>
            <!--
            <div class="one_row_outer last">
                <table class="one_row">
                    <tr>
                        <td>Гаврилов Игорь Петровчи</td>
                        <td>Солнце и Земля</td>
                        <td>Длинное название института, Варшава, Польша</td>
                        <td>Гаврилов Лаврентий Михайлович</td>
                        <td>сессионный</td>
                    </tr>
                </table>
            </div>
             -->
        </div>
    </div>
</div>
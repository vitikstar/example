<?php

use yii\helpers\VarDumper;

?>
<table style="width: 100%;" class="table-hover table table-bordered">
<thead>
    <tr>
        <th>№</th>
        <th>Викладач</th>
        <th>Група</th>
        <th>Предмет</th>
        <th>Тип аудиторії</th>
        <th>К-ть годин</th>
        <th>Дата початку</th>
        <th>Дата кінця</th>
        <th>Тип занняття</th>
    </tr>
</thead>
    <?php 
    $i=0;
    foreach($row as $item): 
    $i++;
    ?>
        <tr class="tr_hour_table_load"
        style="cursor: pointer;" 
        data-teacher_id="<?=$item->teacher_id?>"
        data-predmet_id="<?=$item->predmet_id?>"
        data-para="<?=$para?>"
        data-weekly="<?=$weekly?>"
        data-day="<?=$day?>"
        data-id-row="<?=$row_id?>"
        data-occupation-type-id="<?=$item->type_lesson_id?>"
        >
        <td><?=$i?></td>
        <td><?=$item->teacher->t_name?></td>
        <td><?=$item->grupa->name?></td>
        <td><?=$item->predmet->name?></td>
        <td><?=$item->typeAud->title?></td>
        <td><?=$item->hours?></td>
        <td><?=$item->start_date?></td>
        <td><?=$item->end_date?></td>
        <td><?=$item->typeLesson->title?></td>
    </tr>
    <?php endforeach; ?>
</table>
<script>
        $('.tr_hour_table_load').click(function(){
            var img = '<img src="/img/loading_grean.gif" style="width: 40px;">';

            $("#<?=$row_id?>").find('.res').html(img);

            $.ajax(
                {
                    url: '<?=\yii\helpers\Url::to('/lessons-schedule/body/add-para-ajax') ?>',
                    method: 'post',
                    type: "html",
                    data: {
                        'teacher_id': $(this).attr('data-teacher_id'),
                        'predmet_id': $(this).attr('data-predmet_id'),
                        'para': $(this).attr('data-para'),
                        'day': $(this).attr('data-day'),
                        'weekly': $(this).attr('data-weekly'),
                        'row_id': $(this).attr('data-id-row'),
                        'grupa_id': "<?=$grupa_id?>",
                        'occupation_type_id':$(this).attr('data-occupation-type-id')
                    },
                    success: function(result){
                        $("#<?=$row_id?>").find('.res').html(result);
                    }
                });
        });
</script>
<style type="text/css">
    .ritz .waffle a {
        color: inherit;
    }

    .ritz .waffle .s2 {
        border: 1px SOLID #000000;
        text-align: left;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: nowrap;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .fn{
        cursor: pointer;
    }

    .waffle {
        width: 100%;
    }
    .ritz .waffle .s0 {
        border: 1px SOLID #000000;
        background-color: #ffffff;
        text-align: center;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: nowrap;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s3 {
        border: 1px SOLID #000000;
        background-color: #ffffff;
        text-align: right;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: nowrap;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }

    .ritz .waffle .s1 {
        border: 1px SOLID #000000;
        background-color: #ffffff;
        text-align: left;
        color: #000000;
        font-family: 'Arial';
        font-size: 10pt;
        vertical-align: bottom;
        white-space: nowrap;
        direction: ltr;
        padding: 2px 3px 2px 3px;
    }
</style>
<div class="ritz grid-container" dir="ltr">
    <table class="table table-bordered" cellspacing="0" cellpadding="0">
    <thead>
            <tr style="height: 20px">
                <th class="s0" dir="ltr" rowspan="4">Пара</th>
                <th class="s0" dir="ltr" rowspan="4">Час</th>
                <th class="s0" dir="ltr" colspan="10" style="text-align: center;">1 тиждень</th>
            </tr>
            <tr style="height: 20px">
                <th class="s0" dir="ltr" colspan="2">Понеділок</th>
                <th class="s0" dir="ltr" colspan="2">Вівторок</th>
                <th class="s0" dir="ltr" colspan="2">Середа</th>
                <th class="s0" dir="ltr" colspan="2">Четвер</th>
                <th class="s0" dir="ltr" colspan="2">Пятниця</th>
            </tr>
            <tr style="height: 20px">
                <th class="s1" dir="ltr">Предмет</th>
                <th class="s2" dir="ltr">аудиторія</th>
                <th class="s1" dir="ltr">Предмет</th>
                <th class="s2" dir="ltr">аудиторія</th>
                <th class="s1" dir="ltr">Предмет</th>
                <th class="s2" dir="ltr">аудиторія</th>
                <th class="s1" dir="ltr">Предмет</th>
                <th class="s2" dir="ltr">аудиторія</th>
                <th class="s1" dir="ltr">Предмет</th>
                <th class="s1" dir="ltr">аудиторія</th>
            </tr>
            <tr style="height: 20px">
                <th class="s2" dir="ltr" colspan="2">Викладач</th>
                <th class="s2" dir="ltr" colspan="2">Викладач</th>
                <th class="s2" dir="ltr" colspan="2">Викладач</th>
                <th class="s2" dir="ltr" colspan="2">Викладач </th>
                <th class="s2" dir="ltr" colspan="2">Викладач</th>
            </tr>
            <tr style="height: 20px">
                <th class="s2" dir="ltr">№</th>
                <th class="s2" dir="ltr">Підгрупа</th>
                <th class="s3" dir="ltr">1</th>
                <th class="s3" dir="ltr">2</th>
                <th class="s3" dir="ltr">1</th>
                <th class="s3" dir="ltr">2</th>
                <th class="s3" dir="ltr">1</th>
                <th class="s3" dir="ltr">2</th>
                <th class="s3" dir="ltr">1</th>
                <th class="s3" dir="ltr">2</th>
                <th class="s3" dir="ltr">1</th>
                <th class="s3" dir="ltr">2</th>
            </tr>
            </thead>
            <tbody>
            <?php  foreach($arrPara as $key=>$item): ?>
            <tr style="height: 20px">
                <td class="s3" dir="ltr"><?=$key?></td>
                <td class="s2" dir="ltr"><?=$item?></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=1 data-day=1 id="fn_<?=$key?>_1_1" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=2 data-day=1 id="fn_<?=$key?>_2_1" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=1 data-day=2 id="fn_<?=$key?>_1_2" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=2 data-day=2 id="fn_<?=$key?>_2_2" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=1 data-day=3 id="fn_<?=$key?>_1_3" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=2 data-day=3 id="fn_<?=$key?>_2_3" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=1 data-day=4 id="fn_<?=$key?>_1_4" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=2 data-day=4 id="fn_<?=$key?>_2_4" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=1 data-day=5 id="fn_<?=$key?>_1_5" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
                <td class="s2 fn" data-para='<?=$key?>' data-potok=2 data-day=5 id="fn_<?=$key?>_2_5" data-weekly="1"><div class='res'><i class="fas fa-calendar-plus"></i></div><hr><i class="fas fa-trash"></i></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<hr>
<div id="list_hours_load" style="display: none; text-align:center"><img src="/img/loading_grean.gif" style="width: 40px;"></div>
<script>
        $('.fn').click(function(){
            $("#list_hours_load").css('display','block');
            $(this).css('background-color','#B9D783');
            $.ajax(
                {
                    url: '<?=\yii\helpers\Url::to('/lessons-schedule/body/select-load-hours-ajax') ?>',
                    method: 'post',
                    type: "html",
                    data: {
                        'para': $(this).attr('data-para'),
                        'potok': $(this).attr('data-potok'),
                        'day': $(this).attr('data-day'),
                        'weekly': $(this).attr('data-weekly'),
                        'row_id': $(this).attr('id'),
                        'grupa_id': "<?=$grupa_id?>"
                    },
                    success: function(result){
                        $("#list_hours_load").html(result);
                    }
                });
        });
</script>
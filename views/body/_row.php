

<!-- Modal -->
<div class="modal  bd-example-modal-lg" id="modalAddP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Оберіть вільну аудиторію</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="list-group">
      <?php foreach($arrAud as $aud_id=>$auditory): ?>
  <p style="cursor: pointer;" class="list-group-item list-group-item-action select-aud" data-aud-id='<?=$aud_id?>'><?=$auditory?></a>
      <?php endforeach; ?>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
      </div>
    </div>
  </div>
</div>
<script>
$('#modalAddP').modal('show');
        $('.select-aud').click(function(){
            var img = '<img src="/img/loading_grean.gif" style="width: 40px;">';

            $("#<?=$row_id?>").find('.res').html(img);

            $.ajax(
                {
                    url: '<?=\yii\helpers\Url::to('/lessons-schedule/body/insert-row-para-ajax') ?>',
                    method: 'post',
                    type: "html",
                    data: {
                        'teacher_id': "<?=$teacher_id?>",
                        'predmet_id': "<?=$predmet_id?>",
                        'para': "<?=$para?>",
                        'day': "<?=$day?>",
                        'weekly': "<?=$weekly?>",
                        'aud_id': $(this).attr('data-aud-id'),
                        'grupa_id': "<?=$grupa_id?>",
                        'row_id': "<?=$row_id?>",
                        'occupation_type_id':"<?=$occupation_type_id?>"
                    },
                    success: function(result){
                        $("#<?=$row_id?>").find('.res').html(result);
                        $('#modalAddP').modal('hide');
                        $(".modal-backdrop").remove();
                    }
                });
        });
</script>
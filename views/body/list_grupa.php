<?php

use yii\helpers\Url;

foreach($arrGrupa as $grupa_id=>$grupa_name): ?>
<p><a href="<?=Url::to(['/lessons-schedule/body/index','grupa_id'=>$grupa_id], $schema = true)?>"><?=$grupa_name?></a></p>
<?php endforeach ?>
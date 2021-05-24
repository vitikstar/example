<?php

use app\common\models\Tools;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\education\models\AsuPredmet */

$this->title = 'Оновлення аудиторії: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Список аудиторій', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновлення';

?>
<div class="asu-auditory-update">
    <?= $this->render('_form', [
        'model' => $model,
        'manager_teacher_id' => $manager_teacher_id,
        'list_teacher' => $list_teacher,
        'list_teacher_default' => $list_teacher_default
    ]) ?>

</div>
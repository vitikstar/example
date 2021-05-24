<?php


/* @var $this yii\web\View */
/* @var $model app\modules\education\models\AsuPredmet */

$this->title = 'Додання аудиторії';
$this->params['breadcrumbs'][] = ['label' => 'Список аудиторій', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asu-predmet-create">
    <?= $this->render('_form', [
        'model' => $model,
        'manager_teacher_id' => $manager_teacher_id,
        'list_teacher' => $list_teacher,
        'list_teacher_default' => $list_teacher_default
    ]) ?>

</div>
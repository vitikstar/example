<?php


/* @var $this yii\web\View */
/* @var $model app\modules\education\models\AsuPredmet */

$this->title = 'Додання аудиторії';
$this->params['breadcrumbs'][] = ['label' => 'Список аудиторій', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asu-predmet-create">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
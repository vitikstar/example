<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\education\models\AsuPredmet */

$this->title = $model->title;
$this->params['breadcrumbs'][] = [
    'label' => 'Список аудиторій',
    'url' => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asu-predmet-view">
    <p>
        <?= Html::a(
            'Оновити',
            ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']
        ) ?>
    <?= Html::a(
                'Видалити',
                ['delete', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Ви впевнені?',
                        'method' => 'post',
                    ],
                ]
            ) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'title',
        'case_number',
        'count_seats_max',
        'count_seats_min'
    ],
]) ?>
</div>
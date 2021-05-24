<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\panel\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\education\models\AsuPredmetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Навантаження';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asu-predmet-index">
    <p>
        <?= Html::a('Додати години', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'teacher.t_name',
            'grupa.name',
            'predmet.name',
            'hours',
            'typeAud.title',
            'typeLesson.title',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn('{view}{delete}{update}'),
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
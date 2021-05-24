<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\panel\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\education\models\AsuPredmetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список кафедр';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asu-kafedra-index">
    <p>
        <?= Html::a('Додати кафедру', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'title',
            [
                'attribute' => 'case_number',
                'label' => 'Корпус',
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'case_number',
                    [1 => 1, 2 => 2, 4 => 4],
                    ['class' => 'form-control', 'prompt' => 'Всі']
                )
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn('{view}{delete}{update}'),
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
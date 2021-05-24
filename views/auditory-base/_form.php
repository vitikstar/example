<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\education\models\AsuPredmet */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="asu-auditory-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6'>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'count_seats_max')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'count_seats_min')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6'>

            <span></span>
            <?php echo $form
                ->field($model, 'case_number')
                ->dropDownList(
                    [1=>1,2=>2,4=>4], 
                    ['prompt' => 'Оберіть'],
                    ['class' => 'form-control']
                )
                ->label('Корпус'); ?>


        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
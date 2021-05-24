<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\education\models\AsuPredmet */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="asu-auditory-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6'>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'title_s')->textInput(['maxlength' => true]) ?>
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
        <div class='col-md-6'>
    <label>Завідувач кафедри</label>
    <?php
            echo Select2::widget([
                'name' => 'manager_teacher_id',
                'value' => $manager_teacher_id, // if preselected
                'data' => $list_teacher,
                'options' => [
                    'placeholder' => 'Оберіть ...',
                    'multiple' => false
                ],
            ]);
            ?>
    </div>
    <div class='col-md-6'>
    <label>Викладачі кафедри</label>
    <?php
            echo Select2::widget([
                'name' => 'list_teacher',
                'value' => $list_teacher_default, // if preselected
                'data' => $list_teacher,
                'options' => [
                    'placeholder' => 'Оберіть ...',
                    'multiple' => true
                ],
            ]);
            ?>
    </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
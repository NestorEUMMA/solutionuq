<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Planilla */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><?= Html::encode($this->title) ?></h5>
      </div>
<div class="ibox-content">
  <?php $form = ActiveForm::begin(); ?>
  <form class="form-horizontal">
  <div class="form-group">
        <?= $form->field($model, 'IdEmpleado')->textInput() ?>

    <?= $form->field($model, 'Honorario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Comision')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Bono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Anticipos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HorasExtras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Vacaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MesPlanilla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AnioPlanilla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FechaTransaccion')->textInput() ?>

    <?= $form->field($model, 'ISRPlanilla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AFPPlanilla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ISSSPlanilla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Incapacidades')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DiasIncapacidad')->textInput(['maxlength' => true]) ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

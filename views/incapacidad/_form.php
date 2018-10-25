<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Incapacidad */
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

    <?= $form->field($model, 'DiasIncapacidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SalarioDescuento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FechaIncapacidad')->textInput() ?>

    <?= $form->field($model, 'PeriodoIncapacidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MesIncapacidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DescripcionIncapacidad')->textInput(['maxlength' => true]) ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

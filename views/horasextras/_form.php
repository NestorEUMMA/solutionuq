<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Horasextras */
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

    <?= $form->field($model, 'MesPeriodoHorasExt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AnoPeriodoHorasExt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MontoHorasExtras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FechaHorasExtras')->textInput() ?>

    <?= $form->field($model, 'TipoHoraExtra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MontoISRHorasExtras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MontoHorasExtrasTot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CantidadHorasExtras')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HorasAFP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HorasISSS')->textInput(['maxlength' => true]) ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

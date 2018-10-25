<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tramoisr */
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
        <?= $form->field($model, 'NumTramo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TramoDesde')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TramoHasta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TramoAplicarPorcen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TramoExceso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TramoCuota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TramoFormaPago')->textInput(['maxlength' => true]) ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

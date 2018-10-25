<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Configuraciongeneral */
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
        <?= $form->field($model, 'SalarioMinimo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ComisionesConfig')->textInput() ?>

    <?= $form->field($model, 'HorasExtrasConfig')->textInput() ?>

    <?= $form->field($model, 'BonosConfig')->textInput() ?>

    <?= $form->field($model, 'HonorariosConfig')->textInput() ?>

    <?= $form->field($model, 'IdUsuario')->textInput() ?>

    <?= $form->field($model, 'IdEmpresa')->textInput() ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

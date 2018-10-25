<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */
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
        <?= $form->field($model, 'NombreEmpresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdDepartamentos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdMunicipios')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GiroFiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NrcEmpresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NitEmpresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EmpleadoActivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NuPatronal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ImagenEmpresa')->textInput(['maxlength' => true]) ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

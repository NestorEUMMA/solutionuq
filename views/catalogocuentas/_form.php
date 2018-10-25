<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Catalogocuentas */
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
          <?= $form->field($model, 'CodigoCuentas')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

            <?php
                echo $form->field($model, 'TipoCuenta')->widget(Select2::classname(), [
                'data' => $data = [
                  "SALARIO ADMINISTRACION" => "SALARIO ADMINISTRACION",
                  "RETENCIONES LEGALES ISSS" => "RETENCIONES LEGALES ISSS",
                  "RETENCIONES LEGALES AFP" => "RETENCIONES LEGALES AFP",
                  "RETENCIONES LEGALES IPSFA" => "RETENCIONES LEGALES IPSFA",
                  "RETENCIONES LEGALES ISR" => "RETENCIONES LEGALES ISR",
                  "ANTICIPOS Y SALARIOS" => "ANTICIPOS Y SALARIOS",
                  "SALARIO LIQUIDO" => "SALARIO LIQUIDO",
                  "SERVICIOS PROFESIONALES" => "SERVICIOS PROFESIONALES",
                  "SALARIO LIQUIDO" => "SALARIO LIQUIDO",
                  "SALARIO LIQUIDO" => "SALARIO LIQUIDO",
                ],
                'language' => 'es',
                'options' => ['placeholder' => ' Selecione ...'],
                'pluginOptions' => [
                  'allowClear' => true
                ],
                ]);
                ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empleado;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use kartik\date\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Vacaciones */
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
    <?php
      echo $form->field($model, 'IdEmpleado')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Empleado::find()->where(['EmpleadoActivo' => 1])->all(), 'IdEmpleado', 'fullName'),
          'language' => 'es',
          'options' => ['placeholder' => ' Selecione ...'],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]);
      ?>

      <?= $form->field($model, 'MesPeriodoVacaciones')->textInput() ?>

      <?= $form->field($model, 'AnoPeriodoVacaciones')->textInput() ?>


      <?= $form->field($model, 'FechaVacaciones')->textInput() ?>

      <?php
          echo '<label class="control-label">Fecha de Comision</label>';
          echo DatePicker::widget([
              'model' => $model,
              'attribute' => 'FechaVacaciones',
              'options' => ['placeholder' => 'Ingrese..'],
              'pluginOptions' => [
                  'autoclose' => true,
                  'format' => 'yyyy/mm/dd'
              ]
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

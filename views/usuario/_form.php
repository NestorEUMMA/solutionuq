<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Puesto;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
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
    <?= $form->field($model, 'InicioSesion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'Clave')->textInput(['maxlength' => true]) ?>

      <?php
        echo $form->field($model, 'IdPuesto')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Puesto::find()->all(), 'IdPuesto', 'Descripcion'),
            'language' => 'es',
            'options' => ['placeholder' => ' Selecione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>

        <?php
          echo DatePicker::widget([
              'model' => $model,
              'attribute' => 'FechaIngreso',
              'options' => ['placeholder' => 'Ingrese..'],
              'pluginOptions' => [
                  'autoclose' => true,
                  'format' => 'yyyy/mm/dd'
              ]
          ]);
        ?>
    </br>
    <?= $form->field($model, 'Activo')->checkbox() ?>
    <?= $form->field($model, 'ImagenUsuario')->textInput(['maxlength' => true]) ?>

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>
    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

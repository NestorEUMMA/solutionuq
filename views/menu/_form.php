<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
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
        <?= $form->field($model, 'DescripcionMenu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Icono')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'TipoMenu')->widget(Select2::classname(), [
            'data' => $data = [
                "Menu" => "Menu",
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

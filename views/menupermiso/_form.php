<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Puesto;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Menuusuario */
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
        echo $form->field($model, 'MenuUsuarioActivo')->widget(Select2::classname(), [
            'data' => $data = [
                "0" => "No",
                "1" => "Si",

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

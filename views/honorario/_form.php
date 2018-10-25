<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empleado;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Honorario */
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

    <?php echo $form->field($model, 'MontoHonorario')->widget(MaskMoney::classname(), [
                'pluginOptions' => [
                    'prefix' => '$ ',
                    'allowNegative' => false
                ]
            ]);
        ?>

         <?php echo $form->field($model, 'MontoPagar')->widget(MaskMoney::classname(), [
                'pluginOptions' => [
                    'prefix' => '$ ',
                    'allowNegative' => false
                ]
            ]);
        ?>

    <?= $form->field($model, 'ConceptoHonorario')->textInput(['maxlength' => true]) ?>

        <?php
        echo '<label class="control-label">Fecha de Honorario</label>';
        echo DatePicker::widget([
            'model' => $model,
            'attribute' => 'FechaHonorario',
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

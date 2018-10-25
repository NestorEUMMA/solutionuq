<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empleado;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Propinas */
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
 </br>
       <?php echo '<label class="control-label">Fecha Naciemiento</label>'; ?>
       <?= DatePicker::widget([
            'model' => $model,
            'attribute' => 'Fecha',
            'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy/mm/dd'
                ]
          ]);?>
</br>
     <?php
       echo $form->field($model, 'PropinaPeriodo')->widget(Select2::classname(), [
       'data' => $data = [
           "2018" => "2018",
           "2019" => "2019",
           "2020" => "2020",
           "2021" => "2021",
           "2022" => "2022",
           "2023" => "2023",
           "2024" => "2024",
           "2025" => "2025",
       ],
       'language' => 'es',
       'options' => ['placeholder' => ' Selecione ...'],
       'pluginOptions' => [
           'allowClear' => true
       ],
   ]);
   ?>

   <?php
     echo $form->field($model, 'PropinaMes')->widget(Select2::classname(), [
     'data' => $data = [
         "ENERO" => "ENERO",
         "FEBRERO" => "FEBRERO",
         "MARZO" => "MARZO",
         "ABRIL" => "ABRIL",
         "MAYO" => "MAYO",
         "JUNIO" => "JUNIO",
         "JULIO" => "JULIO",
         "AGOSTO" => "AGOSTO",
         "SEPTIEMBRE" => "SEPTIEMBRE",
         "OCTUBRE" => "OCTUBRE",
         "NOVIEMBRE" => "NOVIEMBRE",
         "DICIEMBRE" => "DICIEMBRE",
     ],
     'language' => 'es',
     'options' => ['placeholder' => ' Selecione ...'],
     'pluginOptions' => [
         'allowClear' => true
     ],
 ]);
 ?>

<?= $form->field($model, 'MontoPropina')->textInput(['maxlength' => true]) ?>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-warning']) ?>
</div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

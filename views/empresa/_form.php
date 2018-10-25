<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use app\models\Empleado;
use app\models\Departamentos;
use app\models\Municipios;
use yii\helpers\ArrayHelper;

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

    <?php

        $catList=ArrayHelper::map(app\models\Departamentos::find()->all(), 'IdDepartamentos', 'NombreDepartamento' );
        echo $form->field($model, 'IdDepartamentos')->dropDownList($catList, ['id'=>'NombreDepartamento']);

    ?>

  <?php

    echo $form->field($model, 'IdMunicipios')->widget(DepDrop::classname(), [
        'options'=>['id'=>'DescripcionMunicipios'],
        'pluginOptions'=>[
        'depends'=>['NombreDepartamento'],
         'type' => DepDrop::TYPE_SELECT2,
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
        'placeholder'=>'Seleccione...',
        'url'=>  \yii\helpers\Url::to(['empleado/subcat'])
        ]
        ]);
    ?>

    <?= $form->field($model, 'GiroFiscal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NrcEmpresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NitEmpresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NuPatronal')->textInput(['maxlength' => true]) ?>

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

   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

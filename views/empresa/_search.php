<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdEmpresa') ?>

    <?= $form->field($model, 'NombreEmpresa') ?>

    <?= $form->field($model, 'Direccion') ?>

    <?= $form->field($model, 'IdDepartamentos') ?>

    <?= $form->field($model, 'IdMunicipios') ?>

    <?php // echo $form->field($model, 'GiroFiscal') ?>

    <?php // echo $form->field($model, 'NrcEmpresa') ?>

    <?php // echo $form->field($model, 'NitEmpresa') ?>

    <?php // echo $form->field($model, 'Representante') ?>

    <?php // echo $form->field($model, 'EmpleadoActivo') ?>

    <?php // echo $form->field($model, 'NuPatronal') ?>

    <?php // echo $form->field($model, 'ImagenEmpresa') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParametrosplanillaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametrosplanilla-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdParametroPlanilla') ?>

    <?= $form->field($model, 'FechaCreacion') ?>

    <?= $form->field($model, 'MesPlanilla') ?>

    <?= $form->field($model, 'PeriodoPlanilla') ?>

    <?= $form->field($model, 'QuincenaPlanilla') ?>

    <?php // echo $form->field($model, 'FechaIni') ?>

    <?php // echo $form->field($model, 'FechaFin') ?>

    <?php // echo $form->field($model, 'Tipo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

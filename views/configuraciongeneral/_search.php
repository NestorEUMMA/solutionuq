<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConfiguraciongeneralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuraciongeneral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdConfiguracion') ?>

    <?= $form->field($model, 'SalarioMinimo') ?>

    <?= $form->field($model, 'ComisionesConfig') ?>

    <?= $form->field($model, 'HorasExtrasConfig') ?>

    <?= $form->field($model, 'BonosConfig') ?>

    <?php // echo $form->field($model, 'HonorariosConfig') ?>

    <?php // echo $form->field($model, 'IdUsuario') ?>

    <?php // echo $form->field($model, 'IdEmpresa') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

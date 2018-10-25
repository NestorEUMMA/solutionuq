<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TramoisrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tramoisr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdTramoIsr') ?>

    <?= $form->field($model, 'NumTramo') ?>

    <?= $form->field($model, 'TramoDesde') ?>

    <?= $form->field($model, 'TramoHasta') ?>

    <?= $form->field($model, 'TramoAplicarPorcen') ?>

    <?php // echo $form->field($model, 'TramoExceso') ?>

    <?php // echo $form->field($model, 'TramoCuota') ?>

    <?php // echo $form->field($model, 'TramoFormaPago') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

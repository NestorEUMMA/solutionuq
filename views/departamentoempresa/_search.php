<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DepartamentoempresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departamentoempresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdDepartamentoEmpresa') ?>

    <?= $form->field($model, 'DescripcionDepartamentoEmpresa') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

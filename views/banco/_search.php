<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BancoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banco-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdBanco') ?>

    <?= $form->field($model, 'DescripcionBanco') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

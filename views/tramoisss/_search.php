<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TramoisssSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tramoisss-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdTramoIsss') ?>

    <?= $form->field($model, 'TramoIsss') ?>

    <?= $form->field($model, 'TechoIsss') ?>

    <?= $form->field($model, 'TechoSig') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

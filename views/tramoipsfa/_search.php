<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TramoipsfaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tramoipsfa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdTramoIpsfa') ?>

    <?= $form->field($model, 'TramoIpsfa') ?>

    <?= $form->field($model, 'TechoIpsfa') ?>

    <?= $form->field($model, 'TechoIpsfaSig') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

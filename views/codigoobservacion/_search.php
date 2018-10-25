<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CodigoobservacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="codigoobservacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdCodigoObservacion') ?>

    <?= $form->field($model, 'Codigo') ?>

    <?= $form->field($model, 'DescripcionCodigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

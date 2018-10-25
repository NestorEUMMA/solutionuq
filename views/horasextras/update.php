<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Horasextras */

$this->title = 'Actualizar Horas Extras: ' . $model->IdHorasExtras;
$this->params['breadcrumbs'][] = ['label' => 'Horasextras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdHorasExtras, 'url' => ['view', 'id' => $model->IdHorasExtras]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

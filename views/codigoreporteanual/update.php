<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Codigoreporteanual */

$this->title = 'Actualizar Codigos Reporte Anual: ' . $model->CodigoIngreso;
$this->params['breadcrumbs'][] = ['label' => 'Codigoreporteanuals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CodigoIngreso, 'url' => ['view', 'id' => $model->CodigoIngreso]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

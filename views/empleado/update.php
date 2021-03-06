<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = 'Actualizar Empleado: ' . $model->PrimerNomEmpleado . ' '. $model->PrimerApellEmpleado;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PrimerNomEmpleado . ' '. $model->PrimerApellEmpleado, 'url' => ['view', 'id' => $model->IdEmpleado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

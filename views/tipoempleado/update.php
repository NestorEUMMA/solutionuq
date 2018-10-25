<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipoempleado */

$this->title = 'Actualizar Tipoempleado: ' . $model->IdTipoEmpleado;
$this->params['breadcrumbs'][] = ['label' => 'Tipoempleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTipoEmpleado, 'url' => ['view', 'id' => $model->IdTipoEmpleado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

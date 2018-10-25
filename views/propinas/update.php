<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Propinas */

$this->title = 'Actualizar Propinas: ' . $model->idEmpleado->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Propinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEmpleado->fullname, 'url' => ['view', 'id' => $model->IdPropina]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

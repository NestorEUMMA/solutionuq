<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Incapacidad */

$this->title = 'Actualizar Incapacidad: ' . $model->idEmpleado->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Incapacidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEmpleado->fullname, 'url' => ['view', 'id' => $model->IdIncapacidad]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

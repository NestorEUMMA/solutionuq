<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aguinaldos */

$this->title = 'Actualizar Aguinaldos: ' . $model->idEmpleado->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Aguinaldos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEmpleado->fullname, 'url' => ['view', 'id' => $model->IdAguinaldo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

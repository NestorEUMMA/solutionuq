<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Codigosepp */

$this->title = 'Actualizar Codigo Sepp: ' . $model->Descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Codigo Sepps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Descripcion, 'url' => ['view', 'id' => $model->CodigoSepp]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

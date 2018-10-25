<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Codigoobservacion */

$this->title = 'Actualizar Codigo Observacion OVISSS: ' . $model->DescripcionCodigo;
$this->params['breadcrumbs'][] = ['label' => 'Codigo Observacion OVISSS', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DescripcionCodigo, 'url' => ['view', 'id' => $model->IdCodigoObservacion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

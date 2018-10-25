<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Municipios */

$this->title = 'Actualizar Municipios: ' . $model->IdMunicipios;
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdMunicipios, 'url' => ['view', 'id' => $model->IdMunicipios]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

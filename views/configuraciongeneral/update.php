<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Configuraciongeneral */

$this->title = 'Actualizar Configuracion General: ' . $model->empresa->NombreEmpresa;
$this->params['breadcrumbs'][] = ['label' => 'Configuracion General', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->empresa->NombreEmpresa, 'url' => ['view', 'id' => $model->IdConfiguracion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

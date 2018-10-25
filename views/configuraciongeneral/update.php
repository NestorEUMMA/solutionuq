<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Configuraciongeneral */

$this->title = 'Actualizar Configuraciongeneral: ' . $model->IdConfiguracion;
$this->params['breadcrumbs'][] = ['label' => 'Configuraciongenerals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdConfiguracion, 'url' => ['view', 'id' => $model->IdConfiguracion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

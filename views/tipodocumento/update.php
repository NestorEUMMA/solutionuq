<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipodocumento */

$this->title = 'Actualizar Tipodocumento: ' . $model->IdTipoDocumento;
$this->params['breadcrumbs'][] = ['label' => 'Tipodocumentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTipoDocumento, 'url' => ['view', 'id' => $model->IdTipoDocumento]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

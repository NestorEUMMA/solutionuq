<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipodocumento */

$this->title = 'Actualizar Tipo Documento: ' . $model->DescripcionTipoDocumento;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DescripcionTipoDocumento, 'url' => ['view', 'id' => $model->IdTipoDocumento]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estadocivil */

$this->title = 'Actualizar Estado Civil: ' . $model->DescripcionEstadoCivil;
$this->params['breadcrumbs'][] = ['label' => 'Estado Civil', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DescripcionEstadoCivil, 'url' => ['view', 'id' => $model->IdEstadoCivil]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

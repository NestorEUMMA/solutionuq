<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tramoisr */

$this->title = 'Actualizar Tramoisr: ' . $model->IdTramoIsr;
$this->params['breadcrumbs'][] = ['label' => 'Tramoisrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTramoIsr, 'url' => ['view', 'id' => $model->IdTramoIsr]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

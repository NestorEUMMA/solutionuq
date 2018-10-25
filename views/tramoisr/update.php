<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tramoisr */

$this->title = 'Actualizar Tramo ISR: ' . $model->IdTramoIsr;
$this->params['breadcrumbs'][] = ['label' => 'Tramo ISR', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTramoIsr, 'url' => ['view', 'id' => $model->IdTramoIsr]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

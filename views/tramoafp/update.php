<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tramoafp */

$this->title = 'Actualizar Tramo AFP: ' . $model->TramoAfp;
$this->params['breadcrumbs'][] = ['label' => 'Tramo AFP', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TramoAfp, 'url' => ['view', 'id' => $model->IdTramoAfp]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

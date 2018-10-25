<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tramoafp */

$this->title = 'Actualizar Tramoafp: ' . $model->IdTramoAfp;
$this->params['breadcrumbs'][] = ['label' => 'Tramoafps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTramoAfp, 'url' => ['view', 'id' => $model->IdTramoAfp]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

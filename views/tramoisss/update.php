<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tramoisss */

$this->title = 'Actualizar Tramoisss: ' . $model->IdTramoIsss;
$this->params['breadcrumbs'][] = ['label' => 'Tramoissses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdTramoIsss, 'url' => ['view', 'id' => $model->IdTramoIsss]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

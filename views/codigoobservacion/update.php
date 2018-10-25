<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Codigoobservacion */

$this->title = 'Actualizar Codigoobservacion: ' . $model->IdCodigoObservacion;
$this->params['breadcrumbs'][] = ['label' => 'Codigoobservacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdCodigoObservacion, 'url' => ['view', 'id' => $model->IdCodigoObservacion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

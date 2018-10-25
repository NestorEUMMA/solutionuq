<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Codigoobservacion */

$this->title = 'Crear Codigo Observacion OVISSS';
$this->params['breadcrumbs'][] = ['label' => 'Codigo Observacion OVISSS', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

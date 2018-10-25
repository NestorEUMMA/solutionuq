<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Puestoempresa */

$this->title = 'Crear Puesto Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Puesto Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

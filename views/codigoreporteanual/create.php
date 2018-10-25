<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Codigoreporteanual */

$this->title = 'Crear Codigo reporte anual';
$this->params['breadcrumbs'][] = ['label' => 'Codigos Reporte Anual', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

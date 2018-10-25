<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Planilla */

$this->title = 'Crear Planilla';
$this->params['breadcrumbs'][] = ['label' => 'Planillas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

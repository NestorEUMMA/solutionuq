<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Municipios */

$this->title = 'Crear Municipios';
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

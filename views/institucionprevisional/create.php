<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Institucionprevisional */

$this->title = 'Crear Institucion Previsional';
$this->params['breadcrumbs'][] = ['label' => 'Institucion Previsional', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

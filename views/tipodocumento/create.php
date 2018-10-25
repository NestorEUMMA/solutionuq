<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tipodocumento */

$this->title = 'Crear Tipodocumento';
$this->params['breadcrumbs'][] = ['label' => 'Tipodocumentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

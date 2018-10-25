<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tramoisr */

$this->title = 'Crear Tramoisr';
$this->params['breadcrumbs'][] = ['label' => 'Tramoisrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

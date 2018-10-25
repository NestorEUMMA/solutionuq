<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tramoisr */

$this->title = 'Crear Tramo ISR';
$this->params['breadcrumbs'][] = ['label' => 'Tramo ISR', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

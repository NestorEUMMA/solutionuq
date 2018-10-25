<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Menudetalle */

$this->title = 'Crear Menu Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Menu Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

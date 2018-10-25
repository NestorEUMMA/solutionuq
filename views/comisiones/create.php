<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comisiones */

$this->title = 'Crear Comisiones';
$this->params['breadcrumbs'][] = ['label' => 'Comisiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

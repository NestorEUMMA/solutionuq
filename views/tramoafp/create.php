<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tramoafp */

$this->title = 'Crear Tramo AFP';
$this->params['breadcrumbs'][] = ['label' => 'Tramo AFP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

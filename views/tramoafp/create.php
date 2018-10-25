<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tramoafp */

$this->title = 'Crear Tramoafp';
$this->params['breadcrumbs'][] = ['label' => 'Tramoafps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

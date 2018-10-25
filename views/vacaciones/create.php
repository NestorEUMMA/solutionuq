<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vacaciones */

$this->title = 'Crear Vacaciones';
$this->params['breadcrumbs'][] = ['label' => 'Vacaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

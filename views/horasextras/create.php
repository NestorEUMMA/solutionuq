<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Horasextras */

$this->title = 'Crear Horas Extras';
$this->params['breadcrumbs'][] = ['label' => 'Horas Extras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Anticipos */

$this->title = 'Crear Anticipos';
$this->params['breadcrumbs'][] = ['label' => 'Anticipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aguinaldos */

$this->title = 'Crear Aguinaldos';
$this->params['breadcrumbs'][] = ['label' => 'Aguinaldos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

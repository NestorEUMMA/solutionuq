<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tramoisss */

$this->title = 'Crear Tramoisss';
$this->params['breadcrumbs'][] = ['label' => 'Tramoissses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

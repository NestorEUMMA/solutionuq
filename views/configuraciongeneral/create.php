<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Configuraciongeneral */

$this->title = 'Crear Configuracion General';
$this->params['breadcrumbs'][] = ['label' => 'Configuracion Generals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

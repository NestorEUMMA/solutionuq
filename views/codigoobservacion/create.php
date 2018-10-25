<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Codigoobservacion */

$this->title = 'Crear Codigoobservacion';
$this->params['breadcrumbs'][] = ['label' => 'Codigoobservacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

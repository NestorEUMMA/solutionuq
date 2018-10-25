<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Codigosepp */

$this->title = 'Crear Codigosepp';
$this->params['breadcrumbs'][] = ['label' => 'Codigosepps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

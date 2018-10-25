<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estadocivil */

$this->title = 'Crear Estado Civil';
$this->params['breadcrumbs'][] = ['label' => 'Estado Civil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Horario */

$this->title = 'Crear Horario';
$this->params['breadcrumbs'][] = ['label' => 'Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

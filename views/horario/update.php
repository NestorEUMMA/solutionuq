<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Horario */

$this->title = 'Actualizar Horario: ' . $model->IdHorario;
$this->params['breadcrumbs'][] = ['label' => 'Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdHorario, 'url' => ['view', 'id' => $model->IdHorario]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

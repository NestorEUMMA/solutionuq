<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Institucionprevisional */

$this->title = 'Actualizar Institucionprevisional: ' . $model->IdInstitucionPre;
$this->params['breadcrumbs'][] = ['label' => 'Institucionprevisionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdInstitucionPre, 'url' => ['view', 'id' => $model->IdInstitucionPre]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Departamentos */

$this->title = 'Crear Departamentos';
$this->params['breadcrumbs'][] = ['label' => 'Departamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

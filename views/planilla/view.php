<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Planilla */

$this->title = $model->IdPlanilla;
$this->params['breadcrumbs'][] = ['label' => 'Planillas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
             <?= Html::a('Actualizar', ['update', 'id' => $model->IdPlanilla], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'IdPlanilla',
            'IdEmpleado',
            'Honorario',
            'Comision',
            'Bono',
            'Anticipos',
            'HorasExtras',
            'Vacaciones',
            'MesPlanilla',
            'AnioPlanilla',
            'FechaTransaccion',
            'ISRPlanilla',
            'AFPPlanilla',
            'ISSSPlanilla',
            'Incapacidades',
            'DiasIncapacidad',
                    ],
                ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>

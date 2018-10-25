<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanillaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planillas';
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>

      </div>
          <div class="ibox-content">
            <div class="xml-feed-form">

            <?php $form = ActiveForm::begin(['action' => ['planilla/report'],'options' => ['method' => 'post']]) ?>
            <div class="row">
              <div class="form-group col-md-3">
              <?php echo '<label class="control-label">Fecha Fin</label>'; ?>
                <?= DatePicker::widget([
                    'name' => 'fechaini',
                    'language' => 'es',
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
              </div>
              <div class="form-group col-md-3">
              <?php echo '<label class="control-label">Fecha Fin</label>'; ?>
                <?= DatePicker::widget([
                    'name' => 'fechafin',
                    'language' => 'es',
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]);?>
              </div>
              <div class="row">
                <div class="form-group col-md-3">

                <?php
                $data = [
                        "QUINCENAL" => "QUINCENAL",
                        "SEMANAL" => "SEMANAL",
                        "MENSUAL" => "MENSUAL"
                      ];
                  echo '<label class="control-label">Tipo</label>';
                      echo Select2::widget([
                        'name' => 'tipo',
                        'data' => $data,
                        'options' => [
                            'placeholder' => 'Seleccione ...',
                            'multiple' => false
                        ],
                      ]);
                      ?>
                 </div>
                 <div class="form-group col-md-3">
                 </br>
                     <center>
                       <?= Html::submitButton('Enviar Parametros', ['class' => 'btn btn-primary']) ?>
                     </center>
                  </div>
                 </div>
                </div>
              <?php ActiveForm::end(); ?>
          </div>
      </div>
    </div>
</div>

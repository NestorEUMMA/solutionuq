<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empresa;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Configuraciongeneral */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><?= Html::encode($this->title) ?></h5>
      </div>
<div class="ibox-content">
  <?php $form = ActiveForm::begin(); ?>
  <form class="form-horizontal">
  <div class="form-group">
  <p><center><strong>* Si la percepcion queda marcada, esta descontara ISSS y AFP, si no queda marcada, automaticamente descontara ISR </strong></center></p>

        <?php echo $form->field($model, 'IdEmpresa')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Empresa::find()->all(), 'IdEmpresa', 'NombreEmpresa'),
            'language' => 'es',
            'options' => ['placeholder' => ' Selecione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
          ]);
          ?>
       <?php echo $form->field($model, 'SalarioMinimo')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => '$ ',
                'allowNegative' => false
            ]
        ]);
        ?>

        <?= $form->field($model, 'ComisionesConfig')->checkbox() ?>

        <?= $form->field($model, 'HorasExtrasConfig')->checkbox() ?>

        <?= $form->field($model, 'BonosConfig')->checkbox() ?>

        <?= $form->field($model, 'HonorariosConfig')->checkbox() ?>

         <?= $form->field($model, 'IdUsuario')->textInput() ?>




   </div>
    <div class="form-group" align="right">
        <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </form>
</div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Empleado;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

include '../include/dbconnect.php';
$queryempresa = "SELECT IdEmpresa, NombreEmpresa
               FROM empresa
               WHERE IdEmpresa =  '" . $_SESSION['IdEmpresa'] . "'";
            $resultadoempresa = $mysqli->query($queryempresa);
            while ($test = $resultadoempresa->fetch_assoc())
                       {
                           $empresa = $test['NombreEmpresa'];
                           $idempresa = $test['IdEmpresa'];


                         }

/* @var $this yii\web\View */
/* @var $model app\models\EmpleadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleado-search">

  <?php $form = ActiveForm::begin([
      'action' => ['index'],
      'method' => 'get',
  ]); ?>

    <?php echo $form->field($model, 'IdEmpleado')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Empleado::find()->where(['IdEmpresa' => ''.$idempresa.''])->all(), 'IdEmpleado', 'fullName'),
      'language' => 'es',
      'options' => ['placeholder' => ' Selecione ...'],
      'pluginOptions' => [
          'allowClear' => true
      ],
  ]);
  ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

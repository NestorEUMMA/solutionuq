<?php
// VALIDACION DE SESION Y CONEXION
include '../include/dbconnect.php';
if(!isset($_SESSION))
    {
        session_start();
    }
$usuario = $_SESSION['user'];
 $urlperdelete = '../planillamoviemiento/delete';


 // VALIDACION DE PERMISOS DELETE
     $permisosdelete = "select  menudetalle.DescripcionMenuDetalle as 'DETALLE', menuusuario.MenuUsuarioActivo as 'ACTIVO', menudetalle.Url as 'URL' from menuusuario
             inner join MenuDetalle on menuusuario.IdMenuDetalle = menudetalle.IdMenuDetalle
             inner join menu on menuusuario.IdMenu = menu.IdMenu
             inner join usuario on menuusuario.IdUsuario = usuario.IdUsuario
             where usuario.InicioSesion = '" . $usuario . "' and TipoPermiso = 2 and menudetalle.Url = '" . $urlperdelete . "'";

     $resultadopermisosdelete = $mysqli->query($permisosdelete);

     while ($resdelete = $resultadopermisosdelete->fetch_assoc())
                {
                    $urldelete = $resdelete['URL'];
                    $activodelete = $resdelete['ACTIVO'];
                }

      if($urlperdelete == $urldelete and $activodelete == 1){
          $delete = '{delete}';
      }
      else{
        $delete = '';
      }

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanillamovimientoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resumen de Planilla';
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
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                  <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                    'attribute'=>'IdEmpleado',
                    'value'=>'idEmpleado.fullname',
                    ],
                    'FechaTransaccion',
                    [
                    'attribute' => 'ISRPlanilla',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->ISRPlanilla;
                    }
                    ] ,
                    [
                    'attribute' => 'AFPPlanilla',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->AFPPlanilla;
                    }
                    ] ,
                    [
                    'attribute' => 'ISSSPlanilla',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->ISSSPlanilla;
                    }
                    ] ,
                    [
                    'attribute' => 'Honorario',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->Honorario;
                    }
                    ] ,
                    [
                    'attribute' => 'Comision',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->Comision;
                    }
                    ] ,
                    [
                    'attribute' => 'Bono',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->Bono;
                    }
                    ] ,
                    [
                    'attribute' => 'Anticipos',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->Anticipos;
                    }
                    ] ,
                    [
                    'attribute' => 'HorasExtras',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->HorasExtras;
                    }
                    ] ,
                    [
                    'attribute' => 'Vacaciones',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->Vacaciones;
                    }
                    ] ,
                    [
                    'attribute' => 'Incapacidades',
                    'value' => function ($model) {
                    return '$' . ' ' . $model->Incapacidades;
                    }
                    ] ,
                    'MesPlanilla',
                    'AnioPlanilla',
                    ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:50px;'], 'template' => "$delete"],
                    ],
                    ]); ?>
            </table>
          </div>
      </div>
    </div>
</div>

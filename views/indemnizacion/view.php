<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// VALIDACION DE SESION Y CONEXION
include '../include/dbconnect.php';
if(!isset($_SESSION))
    {
        session_start();
    }

$urlperupdate = '../indemnizacion/update';
$usuario = $_SESSION['user'];


// VALIDACION DE PERMISOS UPDATE
    $permisosupdate = "select  menudetalle.DescripcionMenuDetalle as 'DETALLE', menuusuario.MenuUsuarioActivo as 'ACTIVO', menudetalle.Url as 'URL' from menuusuario
            inner join MenuDetalle on menuusuario.IdMenuDetalle = menudetalle.IdMenuDetalle
            inner join menu on menuusuario.IdMenu = menu.IdMenu
            inner join usuario on menuusuario.IdUsuario = usuario.IdUsuario
            where usuario.InicioSesion = '" . $usuario . "' and TipoPermiso = 2 and menudetalle.Url = '" . $urlperupdate . "'";

    $resultadopermisosupdate = $mysqli->query($permisosupdate);

    while ($resupdate = $resultadopermisosupdate->fetch_assoc())
               {
                   $urlupdate = $resupdate['URL'];
                   $activoupdate = $resupdate['ACTIVO'];
               }
/* @var $this yii\web\View */
/* @var $model app\models\Indemnizacion */

$this->title = $model->idEmpleado->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Indemnizacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
            <?php $id = str_replace('id=',"", $_SERVER["QUERY_STRING"] ); ?>
            <button class="btn btn-success btn-raised btn-exp" value='<?php echo $id; ?>'>
                     IMPRIMIR
            </button>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'idEmpleado.fullname',
                        'FechaIndemnizacion',
                        'MesPeriodoIndem',
                        'AnoPeriodoIndem',
                       [
                           'attribute' => 'MontoIndemnizacion',
                           'value' => function ($model) {
                               return '$' . ' ' . $model->MontoIndemnizacion;
                           }
                        ] ,
                    ],
                ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>
<form id="frm" action="../indemnizacion/reporte.php" method="post" class="hidden">
  <input type="text" id="IdIndemnizacion" name="IdIndemnizacion" />
</form>

<script type="text/javascript">
    $(document).ready(function(){

        $(".btn-exp").click(function(){
            var id = $(this).attr("value");
            $("#IdIndemnizacion").val(id);
            $("#frm").submit();
            //alert(id);
        });
    });

</script>

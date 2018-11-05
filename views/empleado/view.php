<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

// VALIDACION DE SESION Y CONEXION
include '../include/dbconnect.php';
if(!isset($_SESSION))
    {
        session_start();
    }

$urlperupdate = '../empleado/update';
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
/* @var $model app\models\Empleado */

$this->title = $model->PrimerNomEmpleado . ' '. $model->PrimerApellEmpleado;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>

<?php if (Yii::$app->session->hasFlash("success")): ?>
<?php
    $session = \Yii::$app->getSession();
    $session->setFlash("success", "Se a agregado con Exito!"); ?>
    <?= \odaialali\yii2toastr\ToastrFlash::widget([
  "options" => [
      "closeButton"=> true,
      "debug" =>  false,
      "progressBar" => true,
      "preventDuplicates" => true,
      "positionClass" => "toast-top-right",
      "onclick" => null,
      "showDuration" => "100",
      "hideDuration" => "1000",
      "timeOut" => "2000",
      "extendedTimeOut" => "100",
      "showEasing" => "swing",
      "hideEasing" => "linear",
      "showMethod" => "fadeIn",
      "hideMethod" => "fadeOut"
      ]
  ]);?>
<?php endif; ?> 
<?php if (Yii::$app->session->hasFlash("warning")): ?>
<?php
    $session = \Yii::$app->getSession();
    $session->setFlash("warning", "Se a actualizado con Exito!"); ?>
    <?= \odaialali\yii2toastr\ToastrFlash::widget([
  "options" => [
      "closeButton"=> true,
      "debug" =>  false,
      "progressBar" => true,
      "preventDuplicates" => true,
      "positionClass" => "toast-top-right",
      "onclick" => null,
      "showDuration" => "100",
      "hideDuration" => "1000",
      "timeOut" => "2000",
      "extendedTimeOut" => "100",
      "showEasing" => "swing",
      "hideEasing" => "linear",
      "showMethod" => "fadeIn",
      "hideMethod" => "fadeOut"
      ]
  ]);?>
  <?php endif; ?> 
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
          <?php
                  if($urlperupdate == $urlupdate and $activoupdate == 1){
                    ?>
                      <?= Html::a('Actualizar', ['update', 'id' => $model->IdEmpleado], ['class' => 'btn btn-warning']) ?>
                      <?php
                  }
                  else{
                    $update = '';
                  }
            ?>

            <?php $id = str_replace('id=',"", $_SERVER["QUERY_STRING"] ); ?>
            <button class="btn btn-success btn-raised btn-exp" value='<?php echo $id; ?>'>
                     GENERAR CONTRATO
            </button>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <?= DetailView::widget([
                  'model' => $model,
                  'attributes' => [
                  //'IdEmpleado',
                  'Nup',
                  'idTipoDocumento.DescripcionTipoDocumento',
                  'NumTipoDocumento',
                  'DuiExpedido',
                  'DuiEl',
                  'DuiDe',
                  'idInstitucionPre.DescripcionInstitucion',
                  'Genero',
                  'PrimerNomEmpleado',
                  'SegunNomEmpleado',
                  'PrimerApellEmpleado',
                  'SegunApellEmpleado',
                  'ApellidoCasada',
                  'ConocidoPor',
                  'idTipoEmpleado.DescipcionTipoEmpleado',
                  'idEstadoCivil.DescripcionEstadoCivil',
                  'FNacimiento',
                  'NIsss',
                  'MIpsfa',
                  'Nit',

                  'Direccion',
                  'idDepartamentos.NombreDepartamento',
                  'idMunicipios.DescripcionMunicipios',
                  'CorreoElectronico',
                  'TelefonoEmpleado',
                  'CelularEmpleado',
                  'Profesion',
                  'OtrosDatos',

                  'CBancaria',
                  'idBanco.DescripcionBanco',
                  // 'JefeInmediato',
                  'CasoEmergencia',
                  'TeleCasoEmergencia',
                  'Dependiente1',
                  'Dependiente2',
                  'Dependiente3',
                  'Beneficiario',
                  'DocumentBeneficiario',
                  'NDocBeneficiario',

                  'DeducIsssAfp:boolean',
                  'DeducIsssIpsfa:boolean',
                  'NoDependiente:boolean',
                  'SalarioNominal',
                  'HerramientasTrabajo',
                  'idPuestoEmpresa.DescripcionPuestoEmpresa',
                  'EmpleadoActivo:boolean',
                  'FechaContratacion',
                  'FechaDespido',


                  [
                  'attribute'=>'EmpleadoImagen',
                  'value'=> Yii::$app->homeUrl.'/'.$model->EmpleadoImagen,
                  'format' => ['image',['width'=>'100','height'=>'100']],
                  ],
                  ],
                  ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>

<form id="frm" action="../empleado/reporte.php" method="post" class="hidden">
  <input type="text" id="IdEmpleado" name="IdEmpleado" />
</form>

<script type="text/javascript">
    $(document).ready(function(){

        $(".btn-exp").click(function(){
            var id = $(this).attr("value");
            $("#IdEmpleado").val(id);
            $("#frm").submit();
            //alert(id);
        });
    });

</script>

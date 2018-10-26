<?php if (Yii::$app->session->hasFlash("error")): ?>
<?php
    $session = \Yii::$app->getSession();
    $session->setFlash("error", "Se a eliminado con Exito!"); ?>
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
<?php endif; ?> <?php

use yii\helpers\Html;
use yii\grid\GridView;


// VALIDACION DE SESION Y CONEXION
include '../include/dbconnect.php';
if(!isset($_SESSION))
    {
        session_start();
    }

 $urlperupdate = '../empleado/update';
 $urlperview = '../empleado/view';
 $urlpercreate = '../empleado/create';
 $urlperdelete = '../empleado/delete';
 $usuario = $_SESSION['user'];


// ************************************************************************



/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpleadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;


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

    if($urlperupdate == $urlupdate and $activoupdate == 1){
        $update = '{update}';
    }
    else{
      $update = '';
    }

// VALIDACION DE PERMISOS VIEW
    $permisosview = "select  menudetalle.DescripcionMenuDetalle as 'DETALLE', menuusuario.MenuUsuarioActivo as 'ACTIVO', menudetalle.Url as 'URL' from menuusuario
            inner join MenuDetalle on menuusuario.IdMenuDetalle = menudetalle.IdMenuDetalle
            inner join menu on menuusuario.IdMenu = menu.IdMenu
            inner join usuario on menuusuario.IdUsuario = usuario.IdUsuario
            where usuario.InicioSesion = '" . $usuario . "' and TipoPermiso = 2 and menudetalle.Url = '" . $urlperview . "'";

    $resultadopermisosview = $mysqli->query($permisosview);

    while ($resview = $resultadopermisosview->fetch_assoc())
               {
                   $urlview = $resview['URL'];
                   $activoview = $resview['ACTIVO'];
               }

    if($urlperview == $urlview and $activoview == 1){
        $view = '{view}';
    }
    else{
      $view = '';
    }



// VALIDACION DE PERMISOS CREATE
    $permisoscreate = "select  menudetalle.DescripcionMenuDetalle as 'DETALLE', menuusuario.MenuUsuarioActivo as 'ACTIVO', menudetalle.Url as 'URL' from menuusuario
            inner join MenuDetalle on menuusuario.IdMenuDetalle = menudetalle.IdMenuDetalle
            inner join menu on menuusuario.IdMenu = menu.IdMenu
            inner join usuario on menuusuario.IdUsuario = usuario.IdUsuario
            where usuario.InicioSesion = '" . $usuario . "' and TipoPermiso = 2 and menudetalle.Url = '" . $urlpercreate . "'";

    $resultadopermisoscreate = $mysqli->query($permisoscreate);

    while ($rescreate = $resultadopermisoscreate->fetch_assoc())
               {
                   $urlcreate = $rescreate['URL'];
                   $activocreate = $rescreate['ACTIVO'];
               }



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
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
          <?php
                  if($urlpercreate == $urlcreate and $activocreate == 1){
                    ?>
                      <?= Html::a('Ingresar Empleado', ['create'], ['class' => 'btn btn-primary']) ?>
                      <?php
                  }
                  else{
                    $create = '';
                  }
            ?>
        </p>
      </div>
          <div class="ibox-content">
            <div class="table-responsive">
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                      'dataProvider' => $dataProvider,
                      'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                                [
                                'attribute' => 'IdEmpleado',
                                'value' => function ($model) {
                                return $model->getFullName();
                                },
                                ],

                                // 'Nup',
                                // 'IdTipoDocumento',
                                // 'NumTipoDocumento',
                                // 'IdInstitucionPre',
                                // 'Genero',
                                // 'ApellidoCasada',
                                // 'ConocidoPor',
                                // 'IdTipoEmpleado',
                                // 'IdEstadoCivil',
                                // 'FNacimiento',
                                // 'NIsss',
                                // 'MIpsfa',
                                // 'Nit',
                                // 'SalarioNominal',
                                // 'idPuestoEmpresa.DescripcionPuestoEmpresa',
                                // 'Direccion',
                                // 'IdDepartamentos',
                                // 'IdMunicipios',
                                // 'CorreoElectronico',
                                //'TelefonoEmpleado',
                                // 'CelularEmpleado',
                                // 'CBancaria',
                                // 'IdBanco',
                                // 'JefeInmediato',
                                // 'CasoEmergencia',
                                // 'TeleCasoEmergencia',
                                // 'Dependiente1',
                                // 'Dependiente2',
                                // 'Dependiente3',
                                // 'Beneficiario',
                                // 'DocumentBeneficiario',
                                // 'NDocBeneficiario',
                                'DeducIsssAfp:boolean',
                                'NoDependiente:boolean',
                                //'EmpleadoActivo:boolean',
                                'DeducIsssIpsfa:boolean',
                                'FechaContratacion',
                                // 'FechaDespido',

                                [
                                'attribute' => 'EmpleadoImagen',
                                'format' => 'html',
                                'value' => function ($data) {
                                return Html::img(Yii::getAlias('@web').'/'. $data['EmpleadoImagen'],
                                  ['width'=>'50','height'=>'50']);
                                },
                                'options' => ['style' => 'width:75px;'],
                                ],
                              ['class' => 'yii\grid\ActionColumn',
                               'options' => ['style' => 'width:125px;'],
                               'template' => " $view $update $delete "
                              ],
                          ],
                      ]); ?>
                </table>
            </div>
          </div>
      </div>
    </div>
</div>

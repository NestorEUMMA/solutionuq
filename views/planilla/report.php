<?php

use yii\helpers\Html;
use yii\web\Request;
// VALIDACION DE SESION Y CONEXION
include '../include/dbconnect.php';
require("tools/NumeroALetras.php");

if(!isset($_SESSION))
    {
        session_start();
    }

$urlperupdate = '../anticipos/update';
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

if(empty($fechaini) and empty($fechafin) and empty($tipo)){
  $this->title = 'Vista Previa de Planilla: ';
  $this->params['breadcrumbs'][] = ['label' => 'Planilla', 'url' => ['index']];
  $this->params['breadcrumbs'][] = 'Vista Previa';
?>
  </br>
  <div class="row">
      <div class="col-md-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h3><?= Html::encode($this->title) ?></h3>
          <p align="right">

          </p>
        </div>
            <div class="ibox-content">
              <center><h3> Ingresar parametros para mostrar Planilla </h3></br>
                <a href="../../web/planilla/index" class="btn btn-warning">Ingresar Parametros</a>
              </center>
            </div>
        </div>
      </div>
  </div>

<?php
}
else {

 $FechaIni = $fechaini;
 $FechaFin = $fechafin;
 $Tipo = $tipo;


 $diaIni = substr($FechaIni, 8, 2);
 $diaFin = substr($FechaFin, 8, 2);
 if(($diaIni = substr($FechaIni, 8, 2)) >= 01 and ($diaFin = substr($FechaFin, 8, 2)) <= 15){
   $quincena = 1;
 }
 elseif(($diaIni = substr($FechaIni, 8, 2)) >= 15 and ($diaFin = substr($FechaFin, 8, 2)) <= 31){
    $quincena = 2;
 }
 else{
    $quincena = 3;
 }

$queryempresa = "select e.NombreEmpresa, e.Direccion, e.NitEmpresa, d.NombreDepartamento
         from empresa e
         inner join departamentos d on e.IdDepartamentos = d.IdDepartamentos
         where IdEmpresa = 1";
$resultadoqueryempresa = $mysqli->query($queryempresa);

while ($test = $resultadoqueryempresa->fetch_assoc())
    {
        $empresa = $test['NombreEmpresa'];
        $direccion = $test['Direccion'];
        $nitempresa = $test['NitEmpresa'];
        $departamento = $test['NombreDepartamento'];
    }

require("queryResultPlanilla.php");
require("queryResultPlanillaTot.php");

  $mes = strftime("%B");
      if($mes == 'January'){
          $mes = 'Enero';
      }
      elseif($mes == 'February'){
          $mes = 'Febrero';
      }
      elseif($mes == 'March'){
          $mes = 'Marzo';
      }
      elseif($mes == 'April'){
          $mes = 'Abril';
      }
      elseif($mes == 'May'){
          $mes = 'Mayo';
      }
      elseif($mes == 'June'){
          $mes = 'Junio';
      }
      elseif($mes == 'July'){
          $mes = 'Julio';
      }
      elseif($mes == 'August'){
          $mes = 'Agosto';
      }
      elseif($mes == 'September'){
          $mes = 'Septiembre';
      }
      elseif($mes == 'October'){
          $mes = 'Octubre';
      }
      elseif($mes == 'November'){
          $mes = 'Noviembre';
      }
      else{
          $mes = 'Diciembre';
      }

  $anio = date("Y");

  $resultadoquerytotplanilla = $mysqli->query($querytotplanilla);
  $ttotsalario = 0;
  $ttotextras = 0;
  $ttotsalariotot = 0;
  $ttotisss = 0;
  $ttotafp = 0;
  $ttotipsfa = 0;
  $ttotrenta = 0;
  $ttotprecepcion = 0;
  $ttotanticipos = 0;
  $ttotsalarioliquido = 0;

  while ($test = $resultadoquerytotplanilla->fetch_assoc())
             {
                 $ttotsalario += $test['SALARIO'];
                 $ttotextras += $test['EXTRA'];
                 $ttotsalariotot += $test['TOTALSALARIO'];
                 $ttotisss += $test['ISSS'];
                 $ttotafp += $test['AFP'];
                 $ttotipsfa += $test['IPSFA'];
                 $ttotrenta +=  $test['RENTA'];
                 $ttotprecepcion +=  $test['TOTALPERCEPCION'];
                 $ttotanticipos +=  $test['ANTICIPOS'];
                 $ttotsalarioliquido +=  $test['SALARIOLIQUIDO'];

                 $idempleado = $test['IDEMPLEADO'];
                 $nombreCom = $test['NOMBRECOMPLETO'];
                 $dias = $test['DIAS'];
                 $totsalario = $test['SALARIO'];
                 $totextras = $test['EXTRA'];
                 $totsalariotot = $test['TOTALSALARIO'];
                 $totisss = $test['ISSS'];
                 $totafp = $test['AFP'];
                 $toipsfa = $test['IPSFA'];
                 $totrenta =  $test['RENTA'];
                 $totprecepcion =  $test['TOTALPERCEPCION'];
                 $totanticipos =  $test['ANTICIPOS'];
                 $totsalarioliquido =  $test['SALARIOLIQUIDO'];
             }

$this->title = 'Vista Previa de Planilla: ';
$this->params['breadcrumbs'][] = ['label' => 'Planilla', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Vista Previa';
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
          <h3><?= Html::encode($this->title) ?></h3>
      </div>
          <div class="ibox-content">
          <div class="card-content">
              <h4 class="card-title">Vista Previa de Planilla</h4>
              <center><strong><?php echo $empresa; ?></strong>
              <center><strong>PLANILLA DE SALARIO</strong></center>
              <strong><small><?php echo $direccion; ?></small></strong>
              </br><strong><small><?php echo $nitempresa; ?></small></strong>
            </br><strong>Del <?php echo $diaIni; ?> al <?php echo $diaFin; ?> de <?php echo $mes; ?> de <?php echo $anio; ?></strong>
            </br>
              </center>
              <div class="table">
                </br>
                  <table class="table">
                      <thead class="text-primary">
                        <tr>
                          <tr>
                            <td rowspan="2"><strong><center>EMPLEADO</center></strong></td>
                            <td rowspan="2"><strong><center>DIAS</center></strong></td>
                            <td colspan="3"><strong><center>PERCEPCIONES</center></strong></td>
                            <td colspan="5"><strong><center>DEDUCCIONES DE LEY</center></strong></td>
                            <td rowspan="2"><strong><center>OTROS DESCUENTOS</center></strong></td>
                            <td rowspan="2"><strong><center>SALARIO LIQUIDO</center></strong></td>
                          </tr>
                          <tr>
                            <strong>
                            <td><strong><center>SALARIO</center></strong></td>
                            <td><strong><center>EXTRAS</center></strong></td>
                            <td><strong><center>TOTAL</center></strong></td>
                            <td><strong><center>ISSS</center></strong></td>
                            <td><strong><center>AFP</center></strong></td>
                            <td><strong><center>IPSFA</center></strong></td>
                            <td><strong><center>RENTA</center></strong></td>
                            <td><strong><center>TOTAL</center></strong></td>
                          </tr>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while ($row = $resultadoqueryplanilla->fetch_assoc())
                      {
                           echo"<tr>";
                           echo"<td width='210px'>".$row['NOMBRECOMPLETO']."</center></td>";
                           echo"<td width='60px'><center>".$row['DIAS']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['SALARIO']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['EXTRA']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['TOTALSALARIO']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['ISSS']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['AFP']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['IPSFA']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['RENTA']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['TOTALPERCEPCION']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['ANTICIPOS']."</center></td>";
                           echo"<td width='60px'><center>$ ".$row['SALARIOLIQUIDO']."</center></td>";
                      }
                      ?>
                      </tbody>
                      <thead class="text-primary">
                        <tr>
                            <td align="right"><strong>TOTAL:</strong></td>
                            <td></td>
                            <td><strong><center>$<?php echo number_format($ttotsalario,2); ?></center></strong></td>
                            <td><strong><center>$<?php echo number_format($ttotextras,2); ?></center></strong></td>
                            <td><strong><center>$<?php echo number_format($ttotsalariotot,2); ?></center></strong></td>
                            <td><strong><center>$<?php echo number_format($ttotisss,2); ?></center></strong></td>
                            <td><strong><center>$<?php echo number_format($ttotafp,2); ?></center></strong></td>
                            <td><strong><center>$<?php echo number_format($ttotipsfa,2); ?></center></strong></td>
                            <td><strong><center>$<?php echo number_format($ttotrenta,2); ?></center></strong></td>
                            <td><strong><center>$<?php echo number_format($ttotprecepcion,2); ?></center></strong></td>
                            <td><strong><center>$<?php echo number_format($ttotanticipos,2); ?></center></strong></td>
                            <td><strong><center>$<?php echo number_format($ttotsalarioliquido,2); ?></center></strong></td>
                        </tr>
                      </thead>
                  </table>
              </div>
          </div>
          </div>
      </div>
    </div>
</div>
<?php
}
?>

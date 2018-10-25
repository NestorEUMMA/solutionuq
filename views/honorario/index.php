<?php

use yii\helpers\Html;
use yii\grid\GridView;

// VALIDACION DE SESION Y CONEXION
include '../include/dbconnect.php';
if(!isset($_SESSION))
    {
        session_start();
    }

 $urlperupdate = '../honorario/update';
 $urlperview = '../honorario/view';
 $urlpercreate = '../honorario/create';
 $urlperdelete = '../honorario/delete';
 $usuario = $_SESSION['user'];


// ************************************************************************



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

/* @var $this yii\web\View */
/* @var $searchModel app\models\Honorariosearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Honorarios';
$this->params['breadcrumbs'][] = $this->title;
include '../include/dbconnect.php';

      $queryempleado = "select IdEmpleado, CONCAT(PrimerNomEmpleado,' ',SegunNomEmpleado,' ',PrimerApellEmpleado,' ',SegunApellEmpleado)  AS NombreCompleto from empleado where EmpleadoActivo = 1 and NoDependiente = 1 order by NombreCompleto asc";
      $resultadoqueryempleado = $mysqli->query($queryempleado);
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
                    <button class="btn btn-primary btn-raised " data-toggle="modal" data-target="#myModal">
                                                        Ingresar Honorario
                  </button>
                      <?php
                  }
                  else{
                    $create = '';
                  }
            ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                  <?= GridView::widget([
                          'dataProvider' => $dataProvider,
                          // 'filterModel' => $searchModel,
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],

                              //'IdHonorario',
                              [
                                'attribute'=>'IdEmpleado',
                                'value'=>'idEmpleado.fullname',
                              ],
                              //'IdParametro',
                              'ConceptoHonorario',
                               'FechaHonorario',
                               'MesPeriodoHono',
                               'AnoPeriodoHono',
                               [
                                 'attribute' => 'MontoHonorario',
                                 'value' => function ($model) {
                                     return '$' . ' ' . $model->MontoHonorario ;
                                 }
                              ] ,
                              [
                                 'attribute' => 'MontoISRHonorarios',
                                 'value' => function ($model) {
                                     return '$' . ' ' . $model->MontoISRHonorarios ;
                                 }
                              ] ,
                                                                   [
                                 'attribute' => 'MontoPagar',
                                 'value' => function ($model) {
                                     return '$' . ' ' . $model->MontoPagar ;
                                 }
                              ] ,

                              ['class' => 'yii\grid\ActionColumn', 'options' => ['style' => 'width:150px;'], 'template' => " $view $delete {report} "],
                          ],
                      ]); ?>
                </table>
          </div>
      </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <form action="../../views/honorario/honorarioguardar.php" role="form" method="POST">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Honorario a Empleado</h4>

          </div>
          <div class="modal-body">
          <div class="form-group">
            <label for="title">Seleccione un Empleado:</label>
            <select name="Empleado" class="form-control">
                <option value="">--- Seleccione un Empleado ---</option>
                <?php
                    while($row = $resultadoqueryempleado->fetch_assoc()){
                        echo "<option value='".$row['IdEmpleado']."'>".$row['NombreCompleto']."</option>";
                    }
                ?>
            </select>
           </div>
            <div class="form-group">
                <label for="title">Monto Honorario</label>
                <input class="form-control" type="text" name="Honorario" id="currency" />
            </div>
           <div class="form-group">
                <label for="title">Concepto</label>
                <textarea class="form-control" rows="1" name="Concepto" id="comment"></textarea>
            </div>
            <div class="form-group" id="data_2">
                <label for="title">Fecha Bono</label>
                <div class="input-group date">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="Fecha" type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" name="guardarHonorario" >Guardar Cambios</button>
          </div>
        </form>
      </div>
  </div>
</div>
</div>
<script src="../../web/template/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
      $('#data_2 .input-group.date').datepicker({
          startView: 1,
          todayBtn: "linked",
          keyboardNavigation: false,
          forceParse: false,
          autoclose: true,
          format: "yyyy/mm/dd"
      });
    });
</script>

<script>
  $(function() {
    $('#currency').maskMoney();
  })
</script>

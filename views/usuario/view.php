<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

// VALIDACION DE SESION Y CONEXION
include '../include/dbconnect.php';
if(!isset($_SESSION))
    {
        session_start();
    }

$urlperupdate = '../usuario/update';
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
/* @var $model app\models\Usuario */

$this->title = $model->InicioSesion;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
          <?php
                  if($urlperupdate == $urlupdate and $activoupdate == 1){
                    ?>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->IdUsuario], ['class' => 'btn btn-warning']) ?>
                      <?php
                  }
                  else{
                    $update = '';
                  }
            ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'IdUsuario',
                        'InicioSesion',
                        'Nombres',
                        'Apellidos',
                        'Correo',
                        'idPuesto.Descripcion',
                        'FechaIngreso',
                         [
                        'format' => 'boolean',
                        'attribute' => 'Activo',
                        'filter' => [0=>'No',1=>'Si'],
                        ],
                    ],
                ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>

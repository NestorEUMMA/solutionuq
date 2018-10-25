<?php

 require_once 'menuclass.php';

   $queryexpedientesu = "SELECT a.IdUsuario, a.InicioSesion, b.IdPuesto, b.Descripcion as NombrePuesto, concat(a.Nombres, ' ', a.Apellidos) as NombreCompleto, a.FechaIngreso as Fecha, a.ImagenUsuario as Imagen
                  FROM usuario as a
                  inner join puesto as b on b.IdPuesto = a.IdPuesto
                  WHERE InicioSesion =  '" . $_SESSION['user'] . "'";
               $resultadoexpedientesu = $mysqli->query($queryexpedientesu);
               while ($test = $resultadoexpedientesu->fetch_assoc())
                          {
                              $puesto = $test['NombrePuesto'];
                              $nombreusuario = $test['NombreCompleto'];
                              $fecha = $test['Fecha'];
                              $imagen = $test['Imagen'];

                          }

?>
<script src="../template/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<link href="../template/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="../template/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

<script src="../template/js/plugins/fullcalendar/moment.js"></script>
<script src="../template/js/plugins/fullcalendar/fullcalendar.js"></script>
<script src="../template/js/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="../template/js/es.js" type="text/javascript"></script>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle img-md" src="../<?php echo $imagen; ?>" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $nombreusuario; ?></strong>
                        </span>
                       <span class="text-muted text-xs block"><strong class="font-bold"><?php echo $puesto; ?></strong></b></span></span> </a>
                     <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li class="divider"></li>
                        <li><a href="../../include/logout.php?logout">Salir</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    UQS
                </div>
            </li>
            <?php
                $menu = new Menu();
              ?>
               <?php foreach ($menu->getMenu() as $m) : ?>
            <li>
              <a href="<?php echo $m['IdMenu'] ?>"><i class="<?php echo $m['Icono'] ?>"></i>
                <span class="nav-label"><?php echo $m['DescripcionMenu'] ?></span>
                <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse"id="<?php echo $m['IdMenu'] ?>">
                        <li>
                          <?php foreach ($menu->getSubMenu($m['IdMenu']) as $s) : ?>
                            <a href="<?php echo $s['Url'] ?>"><?php echo $s['DescripcionMenuDetalle'] ?></a>
                            <?php endforeach; ?>
                        </li>
                    </ul>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

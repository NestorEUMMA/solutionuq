
<script src="web/template/js/inspinia.js"></script>
<script src="web/template/js/plugins/pace/pace.min.js"></script>
<script src="web/template/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="web/template/js/jquery-3.1.1.min.js"></script>
<script src="web/template/js/bootstrap.min.js"></script>
<script src="web/template/js/plugins/toastr/toastr.min.js"></script>
<script src="web/template/js/plugins/select2/select2.full.min.js"></script>
<?php
session_start();
include 'include/dbconnect.php';

if(isset($_POST['btn-login']))
{
  $InicioSesion = $_POST['InicioSesion'];
  $Clave = $_POST['Clave'];
  $queryusuario = "
  SELECT a.IdUsuario, a.InicioSesion, b.IdPuesto, b.Descripcion as NombrePuesto, concat(a.Nombres, ' ', a.Apellidos) as NombreCompleto
  FROM usuario as a
  inner join puesto as b on b.IdPuesto = a.IdPuesto
  WHERE InicioSesion='$InicioSesion' and Clave = '$Clave' and Activo = 1";
  $resultado_usuario = $mysqli->query($queryusuario);
  while ($row = $resultado_usuario->fetch_assoc()) {
         $_SESSION['IdUsuario'] = $row['IdUsuario'];
         $_SESSION['user'] = $row['InicioSesion'];
         $_SESSION['IdPuesto'] = $row['IdPuesto'];

               }

          if(!empty($_SESSION['user']))
          {
            $queryempresa = "
            SELECT IdEmpresa, NombreEmpresa FROM empresa";
            $resultado_empresa = $mysqli->query($queryempresa);
          echo
            '<script type="text/javascript">
                $(document).ready(function(){
                        $("#thankyouModal").modal("show");
                });
            </script>';

          }
          else
          {
           ?>
           <script>
             $(function () {
                 toastr.options = {
                   "closeButton": true,
                   "debug": false,
                   "progressBar": true,
                   "preventDuplicates": true,
                   "positionClass": "toast-top-right",
                   "onclick": null,
                   "showDuration": "100",
                   "hideDuration": "1000",
                   "timeOut": "2000",
                   "extendedTimeOut": "100",
                   "showEasing": "swing",
                   "hideEasing": "linear",
                   "showMethod": "fadeIn",
                   "hideMethod": "fadeOut"
                 }
                 toastr.error('Usuario y contraseña incorrectos!')
             });
          </script>
                     <?php
          }
        }
        if(isset($_POST['btn-empresa']))
        {
          $IdEmpresa = $_POST['Empresa'];
          $queryseleccionempresa = "
          SELECT IdEmpresa, NombreEmpresa FROM empresa where IdEmpresa ='$IdEmpresa'";
          $resultado_seleccionempresa = $mysqli->query($queryseleccionempresa);
          while ($row = $resultado_seleccionempresa->fetch_assoc()) {
                 $_SESSION['IdEmpresa'] = $row['IdEmpresa'];

                     }

                     if(!empty($_SESSION['IdEmpresa']))
                     {
                       header("Location: web/site/index");
                     }
                     else
                     {
                      ?>
                      <script>
                        $(function () {
                            toastr.options = {
                              "closeButton": true,
                              "debug": false,
                              "progressBar": true,
                              "preventDuplicates": true,
                              "positionClass": "toast-top-right",
                              "onclick": null,
                              "showDuration": "100",
                              "hideDuration": "1000",
                              "timeOut": "2000",
                              "extendedTimeOut": "100",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }
                            toastr.error('El nombre de la Empresa no Existe!')
                        });
                     </script>
                                <?php
                     }
                   }

        ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UQSolution | Login</title>
    <link href="web/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/template/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="web/template/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="web/template/img/uqsolutions.png" />
    <link href="web/template/css/animate.css" rel="stylesheet">
    <link href="web/template/css/style.css" rel="stylesheet">
    <link href="web/template/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="web/template/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">UQS</h1>
            </div>
            <h3>Bienvenido a UQSolution</h3>

            <p>Inicio de Sesion</p>
            <form class="m-t" role="form" method="POST">
                <div class="form-group">
                    <input type="text" id="InicioSesion" name="InicioSesion" class="form-control" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <input type="password" id="Clave" name="Clave" class="form-control" placeholder="Contrasena" required="">
                </div>
                <button type="submit" name="btn-login" id="success" class="btn btn-primary block full-width m-b btn-inicio">Inicio</button>
            </form>
            <p class="m-t"> <script>
                document.write(new Date().getFullYear())
            </script>
            <a href="">  </a>, UQSolution </p>
        </div>
    </div>



<div class="modal inmodal" id="thankyouModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <form class="m-t" role="form" method="POST">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button> -->
                <i class="fa fa-group modal-icon"></i>
                <h4 class="modal-title">UQSolutions, Sistema RRHH</h4>
                <small>Sistema de gestion para empleados</small>
            </div>
            <div class="modal-body">
              <select class="select2_demo_3 form-control" name="Empresa">
                  <option value="">--- Seleccione una Empresa ---</option>
                  <?php
                      while($row = $resultado_empresa->fetch_assoc()){
                          echo "<option value='".$row['IdEmpresa']."'>".$row['NombreEmpresa']."</option>";
                      }
                  ?>
              </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit"  name="btn-empresa" class="btn btn-success">Ingresar</button>
            </div>
          </form>
        </div>
    </div>
</div>

</body>
Z
</html>

<script>
    $(document).ready(function(){
        $(".select2_demo_1").select2();
    });
</script>

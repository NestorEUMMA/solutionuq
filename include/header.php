<?php
$queryempresa = "SELECT NombreEmpresa
               FROM empresa
               WHERE IdEmpresa =  '" . $_SESSION['IdEmpresa'] . "'";
            $resultadoempresa = $mysqli->query($queryempresa);
            while ($test = $resultadoempresa->fetch_assoc())
                       {
                           $empresa = $test['NombreEmpresa'];

                       }

 ?>
<div id="page-wrapper" class="gray-bg">
  <div class="row border-bottom">
  <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
      <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

  </div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <span class="m-r-sm text-muted welcome-message">Bienvenidos UQSolutions RRHH</span>
        </li>
        <li>
            <a href="../../include/logout.php?logout">
                <i class="fa fa-sign-out"></i> <?php echo $empresa; ?>
            </a>
        </li>
    </ul>

</nav>
</div>

<html>
<head>
	<script src="../../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

include '../../include/dbconnect.php';
session_start();

    $Empleado = $_POST['Empleado'];
    $Comision = $_POST['Comision'];
    $Concepto = $_POST['Concepto'];
    $Fecha = $_POST['Fecha'];

    $Parametro = 'select ISRParametro from parametros where IdParametro = 1';
    $SQL = $mysqli->query($Parametro);
    $ResultadoParametro = mysqli_fetch_row($SQL);

    // $ComisionISR = $Comision * $ResultadoParametro[0];
		//
    // $MontoPagarComision = $Comision - $ComisionISR;

		$TramoAfp = 'select TramoAfp from tramoafp where IdTramoAfp = 1';
		$SQL = $mysqli->query($TramoAfp);
		$ResultadoAFPtramo = mysqli_fetch_row($SQL);
		$AFPTRAMO = $ResultadoAFPtramo[0];

		$ComisionAFP = $Comision * $AFPTRAMO;

		$TramoIsss = 'select TramoIsss from tramoisss where IdTramoIsss = 1';
		$SQL = $mysqli->query($TramoIsss);
		$ResultadoIsssTramo = mysqli_fetch_row($SQL);
		$AFPISSS = $ResultadoIsssTramo[0];

		$ComisionISSS = $Comision * $AFPISSS;

		$MontoPagarComision = $Comision - $ComisionAFP - $ComisionISSS;


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

		$insertplanilla = "INSERT INTO planilla(IdEmpleado, FechaTransaccion, Comision, IsssPlanilla,AFPPLanilla, MesPlanilla, AnioPlanilla)"
											 . "VALUES ('$Empleado','$Fecha', '$Comision', '$ComisionISSS','$ComisionAFP','$mes', '$anio')";
		$resultadoinsertplanilla = $mysqli->query($insertplanilla);


    $insert = "INSERT INTO comisiones(IdEmpleado,MontoComision,MesPeriodoComi,AnoPeriodoComi,IdParametro,ConceptoComision,ComisionPagar,FechaComision,ComisionAFP,ComisionISSS)"
                       . "VALUES ('$Empleado','$Comision', '$mes','$anio', 1 , '$Concepto', '$MontoPagarComision','$Fecha', '$ComisionAFP', '$ComisionISSS')";
    $resultadoinsert = $mysqli->query($insert);
    $last_id = $mysqli->insert_id;

     // ECHO $insert;
      header('Location: ../../web/comisiones/view?id='.$last_id);

?>


<!--         <form id="frm" action="../../web/horario/index" method="post" class="hidden">
        </form>

        <script type="text/javascript">
            $(document).ready(function(){
                    $("#frm").submit();
            });

        </script> -->
</body>
</html>

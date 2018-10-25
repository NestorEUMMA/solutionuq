<html>
<head>
	<script src="../../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

include '../../include/dbconnect.php';
session_start();

    $Empleado = $_POST['Empleado'];
    $Bono = $_POST['Bono'];
    $Concepto = $_POST['Concepto'];
    $Fecha = $_POST['Fecha'];

    $Parametro = 'select ISRParametro from parametros where IdParametro = 1';
    $SQL = $mysqli->query($Parametro);
    $ResultadoParametro = mysqli_fetch_row($SQL);

    $BonoISR = $Bono * $ResultadoParametro[0];

    $MontoPagarBono = $Bono -  $BonoISR;


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

		$insertplanilla = "INSERT INTO planilla(IdEmpleado, FechaTransaccion, Bono, ISRPlanilla ,MesPlanilla, AnioPlanilla)"
											 . "VALUES ('$Empleado','$Fecha', '$Bono', '$BonoISR', '$mes', '$anio')";
		$resultadoinsertplanilla = $mysqli->query($insertplanilla);



    $insert = "INSERT INTO bonos(IdEmpleado, MontoBono, MesPeriodoBono, AnoPeriodoBono, FechaBono, ConceptoBono, MontoPagarBono, MontoISRBono)"
                       . "VALUES ('$Empleado','$Bono', '$mes','$anio', '$Fecha', '$Concepto', '$MontoPagarBono', ' $BonoISR')";
    $resultadoinsert = $mysqli->query($insert);
    $last_id = $mysqli->insert_id;


     header('Location: ../../web/bonos/view?id='.$last_id);

?>

</body>
</html>

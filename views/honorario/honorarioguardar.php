<html>
<head>
	<script src="../../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

include '../../include/dbconnect.php';
session_start();

    $Empleado = $_POST['Empleado'];
    $Honorario = $_POST['Honorario'];
    $Concepto = $_POST['Concepto'];
    $Fecha = $_POST['Fecha'];

    $Parametro = 'select ISRParametro from parametros where IdParametro = 1';
    $SQL = $mysqli->query($Parametro);
    $ResultadoParametro = mysqli_fetch_row($SQL);

    $HonorarioISR = $Honorario * $ResultadoParametro[0];
    $MontoPagarHonorario = $Honorario - $HonorarioISR;


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

		$insertplanilla = "INSERT INTO planilla(IdEmpleado, FechaTransaccion, Honorario, ISRPlanilla ,MesPlanilla, AnioPlanilla)"
											 . "VALUES ('$Empleado','$Fecha', '$Honorario', '$HonorarioISR' ,'$mes', '$anio')";
		$resultadoinsertplanilla = $mysqli->query($insertplanilla);



    $insert = "INSERT INTO honorario(IdEmpleado,MontoHonorario,IdParametro,ConceptoHonorario,FechaHonorario,MesPeriodoHono,AnoPeriodoHono,MontoPagar,MontoISRHonorarios)"
                       . "VALUES ('$Empleado','$Honorario', 1 , '$Concepto', '$Fecha','$mes','$anio', '$MontoPagarHonorario','$HonorarioISR')";
    $resultadoinsert = $mysqli->query($insert);
    $last_id = $mysqli->insert_id;


    header('Location: ../../web/honorario/view?id='.$last_id);


?>

</body>
</html>

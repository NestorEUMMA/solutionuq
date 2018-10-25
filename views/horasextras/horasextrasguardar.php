<html>
<head>
	<script src="../../web/plugins/jQuery/jQuery-2.2.0.min.js"></script>



</head>
<body>
 <?php

include '../../include/dbconnect.php';
session_start();

    $Empleado = $_POST['Empleado'];
    $Horas = $_POST['Horas'];
    $Tipo = $_POST['Tipo'];
    $Fecha = $_POST['Fecha'];

    $Parametro = 'select ISRParametro from parametros where IdParametro = 1';
    $SQL = $mysqli->query($Parametro);
    $ResultadoParametro = mysqli_fetch_row($SQL);

    $Salario = 'select SalarioNominal from empleado where IdEmpleado = '.$Empleado.'';
    $SQL = $mysqli->query($Salario);
    $ResultadoSalario = mysqli_fetch_row($SQL);
    $SalarioBase = $ResultadoSalario[0];

    $SalarioPorHoras = ($SalarioBase/30)/8;

    if($Tipo == 'Hora Extra Diurna'){
        $SalarioPorHora = ($SalarioPorHoras*1)*$Horas;
    }
    elseif($Tipo == 'Hora Extra Nocturna'){
        $SalarioPorHora = ($SalarioPorHoras*1.25)*$Horas;
    }
    elseif($Tipo == 'Hora Extra Descanso'){
        $SalarioPorHora = ($SalarioPorHoras*2)*$Horas;
    }
    else{
        $SalarioPorHora = ($SalarioPorHoras*2.25)*$Horas;
    }

    // $HorasISR = $SalarioPorHora * $ResultadoParametro[0];
    // $MontoPagarHoras = $SalarioPorHora - $HorasISR;

		$TramoAfp = 'select TramoAfp from tramoafp where IdTramoAfp = 1';
    $SQL = $mysqli->query($TramoAfp);
    $ResultadoAFPtramo = mysqli_fetch_row($SQL);
    $AFPTRAMO = $ResultadoAFPtramo[0];

		$HorasAFP = $SalarioPorHora * $AFPTRAMO;

		$TramoIsss = 'select TramoIsss from tramoisss where IdTramoIsss = 1';
		$SQL = $mysqli->query($TramoIsss);
		$ResultadoIsssTramo = mysqli_fetch_row($SQL);
		$AFPISSS = $ResultadoIsssTramo[0];

		$HorasISSS = $SalarioPorHora * $AFPISSS;

		$MontoPagarHoras = $SalarioPorHora - $HorasAFP - $HorasISSS;

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

		$insertplanilla = "INSERT INTO planilla(IdEmpleado, FechaTransaccion, HorasExtras, IsssPlanilla,AFPPLanilla,MesPlanilla, AnioPlanilla)"
											 . "VALUES ('$Empleado','$Fecha', '$SalarioPorHora','$HorasISSS','$HorasAFP', '$mes', '$anio')";
		$resultadoinsertplanilla = $mysqli->query($insertplanilla);

    $insert = "INSERT INTO horasextras(IdEmpleado,MesPeriodoHorasExt,AnoPeriodoHorasExt,MontoHorasExtras,
                                         FechaHorasExtras,TipoHoraExtra,HorasAFP,HorasISSS,MontoHorasExtrasTot,CantidadHorasExtras)"
                            . "VALUES ('$Empleado','$mes', '$anio' , '$SalarioPorHora',
                                    '$Fecha','$Tipo','$HorasAFP','$HorasISSS', '$MontoPagarHoras','$Horas')";
    $resultadoinsert = $mysqli->query($insert);
    $last_id = $mysqli->insert_id;

    header('Location: ../../web/horasextras/view?id='.$last_id);
		// echo $insertplanilla;
?>


</body>
</html>

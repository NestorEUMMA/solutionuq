<?php
include '../include/dbconnect.php';
$queryempresa = "SELECT NombreEmpresa
               FROM empresa
               WHERE IdEmpresa =  '" . $_SESSION['IdEmpresa'] . "'";
            $resultadoempresa = $mysqli->query($queryempresa);
            while ($test = $resultadoempresa->fetch_assoc())
                       {
                           $empresa = $test['NombreEmpresa'];

                       }
                      
?>
<script>
    $(function() {
      var example = '<?php echo $empresa; ?>';
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 2000
            };
            toastr.success('<?php echo $empresa; ?>', 'Sistema RRHH UQSolutions');
    });
</script>
<?php

/* @var $this yii\web\View */

$this->title = 'UQSolutions';
?>

<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Calendario </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../template/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  var calendar = $('#calendar').fullCalendar({
   editable:true,
   header:{
    left:'prev,next today',
    center:'title',
    right:'month,agendaWeek,agendaDay'
   },
   events: 'load.php',
   selectable:true,
   selectHelper:true,
   select: function(start, end, allDay)
   {
    var title = prompt("Ingrese Titulo de Evento");
    if(title)
    {
     var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
     $.ajax({
      url:"insert.php",
      type:"POST",
      data:{title:title, start:start, end:end},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Agregado Exitosamente!");
      }
     })
    }
   },
   editable:true,
   eventResize:function(event)
   {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
    var title = event.title;
    var id = event.id;
    $.ajax({
     url:"update.php",
     type:"POST",
     data:{title:title, start:start, end:end, id:id},
     success:function(){
      calendar.fullCalendar('refetchEvents');
      alert('Evento Actualizado');
     }
    })
   },

   eventDrop:function(event)
   {
    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
    var title = event.title;
    var id = event.id;
    $.ajax({
     url:"update.php",
     type:"POST",
     data:{title:title, start:start, end:end, id:id},
     success:function()
     {
      calendar.fullCalendar('refetchEvents');
      alert('Evento Actualizado');
     }
    });
   },

   eventClick:function(event)
   {
    if(confirm("Esta seguro que desea Eliminar el Evento?"))
    {
     var id = event.id;
     $.ajax({
      url:"delete.php",
      type:"POST",
      data:{id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Evento Eliminado");
      }
     })
    }
   },

  });
 });
 </script>

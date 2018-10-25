<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConstancianodependienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
           <?= Html::a('Ingresar Empleado', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <?php echo $this->render('_search', ['model' => $searchModel]); ?>
                                    <?= GridView::widget([
                      'dataProvider' => $dataProvider,
'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                          'IdEmpleado',
'Nup',
'IdTipoDocumento',
'NumTipoDocumento',
'DuiExpedido',
// 'DuiEl',
// 'DuiDe',
// 'IdInstitucionPre',
// 'Genero',
// 'PrimerNomEmpleado',
// 'SegunNomEmpleado',
// 'PrimerApellEmpleado',
// 'SegunApellEmpleado',
// 'ApellidoCasada',
// 'ConocidoPor',
// 'IdTipoEmpleado',
// 'IdEstadoCivil',
// 'FNacimiento',
// 'NIsss',
// 'MIpsfa',
// 'Nit',
// 'SalarioNominal',
// 'IdPuestoEmpresa',
// 'Direccion',
// 'IdDepartamentos',
// 'IdMunicipios',
// 'CorreoElectronico',
// 'TelefonoEmpleado',
// 'CelularEmpleado',
// 'CBancaria',
// 'IdBanco',
// 'JefeInmediato',
// 'CasoEmergencia',
// 'TeleCasoEmergencia',
// 'Dependiente1',
// 'FNacimientoDep1',
// 'Dependiente2',
// 'FNacimientoDep2',
// 'Dependiente3',
// 'FNacimientoDep3',
// 'Beneficiario',
// 'DocumentBeneficiario',
// 'NDocBeneficiario',
// 'DeducIsssAfp:boolean',
// 'NoDependiente:boolean',
// 'EmpleadoActivo:boolean',
// 'FechaContratacion',
// 'FechaDespido',
// 'DeducIsssIpsfa:boolean',
// 'EmpleadoImagen',
// 'IdDepartamentoEmpresa',
// 'Profesion',
// 'OtrosDatos',
// 'HerramientasTrabajo',
// 'Pensionado:boolean',
                              ['class' => 'yii\grid\ActionColumn',
                               'options' => ['style' => 'width:100px;'],
                               'template' => " {view} {update} {delete} "
                              ],
                          ],
                      ]); ?>
                                  </table>
          </div>
      </div>
    </div>
</div>

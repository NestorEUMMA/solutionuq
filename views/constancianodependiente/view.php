<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = $model->IdEmpleado;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h3><?= Html::encode($this->title) ?></h3>
        <p align="right">
             <?= Html::a('Actualizar', ['update', 'id' => $model->IdEmpleado], ['class' => 'btn btn-warning']) ?>
        </p>
      </div>
          <div class="ibox-content">
              <table class="table table-hover">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'IdEmpleado',
            'Nup',
            'IdTipoDocumento',
            'NumTipoDocumento',
            'DuiExpedido',
            'DuiEl',
            'DuiDe',
            'IdInstitucionPre',
            'Genero',
            'PrimerNomEmpleado',
            'SegunNomEmpleado',
            'PrimerApellEmpleado',
            'SegunApellEmpleado',
            'ApellidoCasada',
            'ConocidoPor',
            'IdTipoEmpleado',
            'IdEstadoCivil',
            'FNacimiento',
            'NIsss',
            'MIpsfa',
            'Nit',
            'SalarioNominal',
            'IdPuestoEmpresa',
            'Direccion',
            'IdDepartamentos',
            'IdMunicipios',
            'CorreoElectronico',
            'TelefonoEmpleado',
            'CelularEmpleado',
            'CBancaria',
            'IdBanco',
            'JefeInmediato',
            'CasoEmergencia',
            'TeleCasoEmergencia',
            'Dependiente1',
            'FNacimientoDep1',
            'Dependiente2',
            'FNacimientoDep2',
            'Dependiente3',
            'FNacimientoDep3',
            'Beneficiario',
            'DocumentBeneficiario',
            'NDocBeneficiario',
            'DeducIsssAfp:boolean',
            'NoDependiente:boolean',
            'EmpleadoActivo:boolean',
            'FechaContratacion',
            'FechaDespido',
            'DeducIsssIpsfa:boolean',
            'EmpleadoImagen',
            'IdDepartamentoEmpresa',
            'Profesion',
            'OtrosDatos',
            'HerramientasTrabajo',
            'Pensionado:boolean',
                    ],
                ]) ?>
            </table>
          </div>
      </div>
    </div>
</div>

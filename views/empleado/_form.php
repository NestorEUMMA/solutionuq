<?php

include '../include/dbconnect.php';
$time = time();
$hoy = date("Y-m-d H:i:s", $time -28800);
$queryempresa = "SELECT IdEmpresa, NombreEmpresa
               FROM empresa
               WHERE IdEmpresa =  '" . $_SESSION['IdEmpresa'] . "'";
            $resultadoempresa = $mysqli->query($queryempresa);
            while ($test = $resultadoempresa->fetch_assoc())
                       {
                           $idempresa = $test['IdEmpresa'];
                           $empresa = $test['NombreEmpresa'];

                       }

$queryusuario = "SELECT a.IdUsuario as 'IdUsuario', a.InicioSesion, b.IdPuesto, b.Descripcion as NombrePuesto, concat(a.Nombres, ' ', a.Apellidos) as NombreCompleto, a.FechaIngreso as Fecha, a.ImagenUsuario as Imagen
                  FROM usuario as a
                  inner join puesto as b on b.IdPuesto = a.IdPuesto
                  WHERE InicioSesion =  '" . $_SESSION['user'] . "'";
               $resultadousuario = $mysqli->query($queryusuario);
               while ($test = $resultadousuario->fetch_assoc())
                          {
                              $idusuario = $test['IdUsuario'];
                              $puesto = $test['NombrePuesto'];
                              $nombreusuario = $test['NombreCompleto'];
                              $fecha = $test['Fecha'];
                              $imagen = $test['Imagen'];

                          }

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tipodocumento;
use app\models\Institucionprevisional;
use app\models\Tipoempleado;
use app\models\Estadocivil;
use app\models\Puestoempresa;
use app\models\Empleado;
use app\models\Departamentos;
use app\models\Departamentoempresa;
use app\models\Municipios;
use app\models\Banco;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use kartik\money\MaskMoney;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleado-form box panel solid">

   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

       <div class="row m-t-lg">
         <div class="col-lg-12">
             <div class="tabs-container">
                     <ul class="nav nav-tabs">
                         <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-laptop"></i></a></li>
                         <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-laptop"></i></a></li>
                         <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-laptop"></i></a></li>
                         <li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-laptop"></i></a></li>
                         <li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-laptop"></i></a></li>
                         <li class=""><a data-toggle="tab" href="#tab-6"><i class="fa fa-laptop"></i></a></li>
                         <li class="pull-right">
                             <?= Html::submitButton($model->isNewRecord ? 'Ingresar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-warning']) ?>
                         </li>
                     </ul>
                     <div class="tab-content ">
                         <div id="tab-1" class="tab-pane active">
                             <div class="panel-body">
                                 <div>
                                   <div class="row">
                                   <?php echo $hoy  ?>
                                       <div class="form-group col-lg-4">
                                           <?= $form->field($model, 'Nup')->widget(\yii\widgets\MaskedInput::className(), [
                                                   'mask' => '999999999999',
                                               ]) ?>
                                       </div>
                                       <div class="form-group col-lg-4">
                                           <?php
                                               echo $form->field($model, 'IdTipoDocumento')->widget(Select2::classname(), [
                                                   'data' => ArrayHelper::map(Tipodocumento::find()->all(), 'IdTipoDocumento', 'DescripcionTipoDocumento'),
                                                   'language' => 'es',
                                                   'options' => ['placeholder' => ' Selecione ...'],
                                                   'pluginOptions' => [
                                                       'allowClear' => true
                                                   ],
                                               ]);
                                               ?>
                                       </div>
                                       <div class="form-group col-lg-4">

                                           <?= $form->field($model, 'NumTipoDocumento')->widget(\yii\widgets\MaskedInput::className(), [
                                                   'mask' => '999999999',
                                           ]) ?>
                                       </div>
                                       <div class="form-group col-lg-4">
                                           <?php
                                           echo $form->field($model, 'DuiExpedido', [
                                               'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                           ])->textInput()->input('PrimerNomEmpleado', ['placeholder' => ""]);
                                           ?>
                                       </div>
                                       <div class="form-group col-lg-3">
                                           <?php
                                           echo $form->field($model, 'DuiEl', [
                                               'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                           ])->textInput()->input('PrimerNomEmpleado', ['placeholder' => ""]);
                                           ?>
                                       </div>
                                       <div class="form-group col-lg-1">
                                           <?= $form->field($model, 'DuiDe')->widget(\yii\widgets\MaskedInput::className(), [
                                               'mask' => '9999',
                                           ]) ?>
                                       </div>
                                       <div class="form-group col-lg-4">
                                           <?= $form->field($model, 'NIsss')->widget(\yii\widgets\MaskedInput::className(), [
                                               'mask' => '999999999',
                                           ]) ?>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="form-group col-lg-2">
                                           <?php
                                               echo $form->field($model, 'IdInstitucionPre')->widget(Select2::classname(), [
                                                   'data' => ArrayHelper::map(Institucionprevisional::find()->all(), 'IdInstitucionPre', 'DescripcionInstitucion'),
                                                   'language' => 'es',
                                                   'options' => ['placeholder' => ' Selecione...'],
                                                   'pluginOptions' => [
                                                       'allowClear' => true
                                                   ],
                                               ]);
                                               ?>
                                       </div>
                                       <div class="form-group col-lg-2">
                                           <?= $form->field($model, 'MIpsfa')->widget(\yii\widgets\MaskedInput::className(), [
                                                   'mask' => '9999999999999999',
                                           ]) ?>
                                       </div>
                                       <div class="form-group col-lg-4">
                                           <?= $form->field($model, 'Nit')->widget(\yii\widgets\MaskedInput::className(), [
                                               'mask' => '9999-999999-999-9',
                                           ]) ?>
                                       </div>
                                       <div class="form-group col-lg-4">
                                           <?php
                                           echo $form->field($model, 'Profesion', [
                                               'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                           ])->textInput()->input('CorreoElectronico', ['placeholder' => ""]);
                                           ?>
                                       </div>
                                   </div>
                                 </div>
                             </div>
                         </div>
                         <div id="tab-2" class="tab-pane">
                             <div class="panel-body">
                               <div class="row">
                                   <div class="form-group col-lg-3">
                                       <?php
                                       echo $form->field($model, 'PrimerNomEmpleado', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('PrimerNomEmpleado', ['placeholder' => ""]);
                                       ?>
                                   </div>
                                   <div class="form-group col-lg-3">
                                           <?php
                                           echo $form->field($model, 'SegunNomEmpleado', [
                                               'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                           ])->textInput()->input('SegunNomEmpleado', ['placeholder' => ""]);
                                           ?>
                                   </div>
                                   <div class= "col-lg-3">
                                       <?php
                                       echo $form->field($model, 'PrimerApellEmpleado', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('PrimerApellEmpleado', ['placeholder' => ""]);
                                       ?>
                                   </div>
                                   <div class="form-group col-lg-3">
                                       <?php
                                       echo $form->field($model, 'SegunApellEmpleado', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('SegunApellEmpleado', ['placeholder' => ""]);
                                       ?>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-lg-3">
                                       <?php
                                       echo $form->field($model, 'ApellidoCasada', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('ApellidoCasada', ['placeholder' => ""]);
                                       ?>
                                   </div>
                                   <div class="form-group col-lg-3">
                                       <?php
                                       echo $form->field($model, 'ConocidoPor', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('ConocidoPor', ['placeholder' => ""]);
                                       ?>
                                   </div>
                                   <div class="form-group col-lg-3">
                                     <?php echo '<label class="control-label">Fecha Naciemiento</label>'; ?>
                                     <?= DatePicker::widget([
                                          'model' => $model,
                                          'attribute' => 'FNacimiento',
                                          'template' => '{addon}{input}',
                                              'clientOptions' => [
                                                  'autoclose' => true,
                                                  'format' => 'yyyy/mm/dd'
                                              ]
                                        ]);?>

                                   </div>
                                   <div class="form-group col-lg-3">
                                       <?php
                                           echo $form->field($model, 'IdEstadoCivil')->widget(Select2::classname(), [
                                               'data' => ArrayHelper::map(Estadocivil::find()->all(), 'IdEstadoCivil', 'DescripcionEstadoCivil'),
                                               'language' => 'es',
                                               'options' => ['placeholder' => ' Selecione ...'],
                                               'pluginOptions' => [
                                                   'allowClear' => true
                                               ],
                                           ]);
                                           ?>
                                   </div>
                               </div>
                             </div>
                         </div>
                         <div id="tab-3" class="tab-pane">
                             <div class="panel-body">
                               <div class="row">
                                           <div class="form-group col-lg-6">
                                               <?php
                                               echo $form->field($model, 'Direccion', [
                                                   'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                               ])->textInput()->input('Direccion', ['placeholder' => ""]);
                                               ?>
                                           </div>
                                           <div class="form-group col-lg-3">
                                           <?php
                                           $catList=ArrayHelper::map(app\models\Departamentos::find()->all(), 'IdDepartamentos', 'NombreDepartamento' );
                                           echo $form->field($model, 'IdDepartamentos')->dropDownList($catList, ['id'=>'NombreDepartamento']);

                                           ?>
                                           </div>
                                           <div class="form-group col-lg-3">
                                               <?php
                                               echo $form->field($model, 'IdMunicipios')->widget(DepDrop::classname(), [
                                                   'options'=>['id'=>'DescripcionMunicipios'],
                                                   'pluginOptions'=>[
                                                   'depends'=>['NombreDepartamento'],
                                                    'type' => DepDrop::TYPE_SELECT2,
                                                   'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                                                   'placeholder'=>'Seleccione...',
                                                   'url'=>  \yii\helpers\Url::to(['empleado/subcat'])
                                                   ]
                                                   ]);
                                               ?>
                                           </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-lg-3">
                                       <?php
                                       echo $form->field($model, 'CorreoElectronico', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('CorreoElectronico', ['placeholder' => ""]);
                                       ?>
                                   </div>
                                   <div class="form-group col-lg-3">
                                       <?php echo $form->field($model, 'Genero')->dropDownList(['' => 'Seleccione...','Masculino' => 'Masculino', 'Femenino' => 'Femenino']); ?>
                                   </div>
                                   <div class="form-group col-lg-3">
                                       <?= $form->field($model, 'TelefonoEmpleado')->widget(\yii\widgets\MaskedInput::className(), [
                                       'mask' => '9999-9999',
                                   ]) ?>
                                   </div>

                                   <div class="form-group col-lg-3">
                                       <?= $form->field($model, 'CelularEmpleado')->widget(\yii\widgets\MaskedInput::className(), [
                                       'mask' => '9999-9999',
                                   ]) ?>
                                   </div>
                               </div>
                               <div class="row">
                                 <div class="form-group col-lg-3">
                                     <?php
                                     echo $form->field($model, 'OtrosDatos', [
                                         'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                     ])->textInput()->input('CorreoElectronico', ['placeholder' => ""]);
                                     ?>
                                 </div>
                               </div>
                             </div>
                         </div>
                         <div id="tab-4" class="tab-pane">
                             <div class="panel-body">
                               <div class="row">
                                   <div class="form-group col-lg-8">
                                       <?php
                                       echo $form->field($model, 'Dependiente1', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('Dependiente1', ['placeholder' => ""]);
                                       ?>
                                   </div>
                                   <div class="form-group col-lg-4">
                                     <?php echo '<label class="control-label">Fecha de Nacimiento</label>'; ?>
                                     <?= DatePicker::widget([
                                          'model' => $model,
                                          'attribute' => 'FNacimientoDep1',
                                          'template' => '{addon}{input}',
                                              'clientOptions' => [
                                                  'autoclose' => true,
                                                  'format' => 'yyyy/mm/dd'
                                              ]
                                        ]);?>
                                   </div>
                                   <div class="form-group col-lg-8">
                                       <?php
                                       echo $form->field($model, 'Dependiente2', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('Dependiente2', ['placeholder' => ""]);
                                       ?>
                                   </div>
                                   <div class="form-group col-lg-4">
                                     <?php echo '<label class="control-label">Fecha de Nacimiento</label>'; ?>
                                     <?= DatePicker::widget([
                                          'model' => $model,
                                          'attribute' => 'FNacimientoDep2',
                                          'template' => '{addon}{input}',
                                              'clientOptions' => [
                                                  'autoclose' => true,
                                                  'format' => 'yyyy/mm/dd'
                                              ]
                                        ]);?>
                                   </div>
                                   <div class= "col-lg-8">
                                       <?php
                                       echo $form->field($model, 'Dependiente3', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('Dependiente3', ['placeholder' => ""]);
                                       ?>
                                   </div>
                                   <div class="form-group col-lg-4">
                                     <?php echo '<label class="control-label">Fecha de Nacimiento</label>'; ?>
                                     <?= DatePicker::widget([
                                          'model' => $model,
                                          'attribute' => 'FNacimientoDep3',
                                          'template' => '{addon}{input}',
                                              'clientOptions' => [
                                                  'autoclose' => true,
                                                  'format' => 'yyyy/mm/dd'
                                              ]
                                        ]);?>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-lg-8">
                                       <?php
                                       echo $form->field($model, 'CasoEmergencia', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('', ['placeholder' => ""]);
                                       ?>
                                   </div>
                                   <div class="form-group col-lg-4">
                                       <?= $form->field($model, 'TeleCasoEmergencia')->widget(\yii\widgets\MaskedInput::className(), [
                                       'mask' => '9999-9999',
                                   ]) ?>
                                   </div>
                                   <div class="form-group col-lg-4">
                                        <?php
                                       echo $form->field($model, 'Beneficiario', [
                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                       ])->textInput()->input('', ['placeholder' => ""]);
                                       ?>
                                   </div>

                                   <div class="form-group col-lg-4">
                                       <?php echo $form->field($model, 'DocumentBeneficiario')->dropDownList(['Seleccione...' => 'Seleccione...','DUI' => 'DUI', 'NIT' => 'NIT']); ?>

                                   </div>
                                   <div class="form-group col-lg-4">
                                       <?= $form->field($model, 'NDocBeneficiario')->widget(\yii\widgets\MaskedInput::className(), [
                                       'mask' => '99999999999999',
                                   ]) ?>
                                   </div>
                               </div>
                             </div>
                         </div>
                         <div id="tab-5" class="tab-pane">
                             <div class="panel-body">
                               <div class="row">
                                 <div class="form-group col-lg-12">
                                   <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                                         'options' => ['accept'=>'uploads/empleados/*'],
                                         'pluginOptions'=>[
                                           'previ2ewFileType' => 'image',
                                             'allowedFileExtensions'=>['jpg', 'gif', 'png', 'bmp'],
                                             'showUpload' => true,
                                             // 'initialPreview' => [
                                             //     $model->EmpleadoImagen ? Html::img('../'.$model->EmpleadoImagen
                                             //     ) : null, // checks the models to display the preview
                                             // ],
                                             'initialCaption'=> $model->EmpleadoImagen,
                                         ],
                                     ]); ?>
                                  </div>
                               </div>
                             </div>
                         </div>
                         <div id="tab-6" class="tab-pane">
                             <div class="panel-body">
                               <div class="col-lg-12">
                                   <section class="panel">
                                       <header class="panel-heading">
                                           EMPRESA
                                       </header>
                                       <div class="panel-body">
                                           <div>
                                               <div class="row">
                                                   <div class="form-group col-lg-4">
                                                 <?php
                                                   $catList=ArrayHelper::map(app\models\Departamentoempresa::find()->all(), 'IdDepartamentoEmpresa', 'DescripcionDepartamentoEmpresa' );
                                                           echo $form->field($model, 'IdDepartamentoEmpresa')->dropDownList($catList, ['id'=>'DescripcionDepartamentoEmpresa']);
                                                           ?>
                                                   </div>
                                                   <div class="form-group col-lg-4">

                                                           <?php
                                                               echo $form->field($model, 'IdPuestoEmpresa')->widget(DepDrop::classname(), [
                                                                   'options'=>['id'=>'DescripcionPuestoEmpresa'],
                                                                   'pluginOptions'=>[
                                                                   'depends'=>['DescripcionDepartamentoEmpresa'],
                                                                    'type' => DepDrop::TYPE_SELECT2,
                                                                   'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
                                                                   'placeholder'=>'Seleccione...',
                                                                   'url'=>  \yii\helpers\Url::to(['empleado/subpue'])
                                                                   ]
                                                                   ]);
                                                               ?>
                                                   </div>
                                                   <div class="form-group col-lg-4">
                                                       <?php echo $form->field($model, 'SalarioNominal')->widget(MaskMoney::classname(), [
                                                           'pluginOptions' => [
                                                               'prefix' => '$ ',
                                                               'allowNegative' => false
                                                           ]
                                                       ]);
                                                       ?>
                                                   </div>
                                                   <div class="form-group col-lg-4">
                                                       <?php
                                                           echo $form->field($model, 'JefeInmediato')->widget(Select2::classname(), [
                                                               'data' => ArrayHelper::map(Empleado::find()->where(['EmpleadoActivo' => 1])->all(), 'IdEmpleado', 'fullName'),
                                                               'language' => 'es',
                                                               'options' => ['placeholder' => ' Selecione ...'],
                                                               'pluginOptions' => [
                                                                   'allowClear' => true
                                                               ],
                                                           ]);
                                                           ?>
                                                   </div>
                                                   <div class="form-group col-lg-5">
                                                       <?php
                                                       echo $form->field($model, 'HerramientasTrabajo', [
                                                           'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                                       ])->textInput()->input('CBancaria', ['placeholder' => ""]);
                                                       ?>
                                                   </div>
                                                   <div class="form-group col-lg-3">
                                                       <?php
                                                           echo $form->field($model, 'IdTipoEmpleado')->widget(Select2::classname(), [
                                                               'data' => ArrayHelper::map(Tipoempleado::find()->all(), 'IdTipoEmpleado', 'DescipcionTipoEmpleado'),
                                                               'language' => 'es',
                                                               'options' => ['placeholder' => ' Selecione ...'],
                                                               'pluginOptions' => [
                                                                   'allowClear' => true
                                                               ],
                                                           ]);
                                                           ?>
                                                   </div>
                                               </div>
                                               <div class="row">
                                                 <div class="col-lg-6">
                                                    <section class="panel">
                                                        <header class="panel-heading">
                                                            CUENTA BANCARIA
                                                        </header>
                                                        <div class="panel-body">
                                                            <div>
                                                                <div class="row">
                                                                    <div class="form-group col-lg-6">
                                                                        <?php
                                                                        echo $form->field($model, 'CBancaria', [
                                                                            'inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control transparent']
                                                                        ])->textInput()->input('CBancaria', ['placeholder' => ""]);
                                                                        ?>
                                                                    </div>

                                                                    <div class="form-group col-lg-6">
                                                                        <?php
                                                                            echo $form->field($model, 'IdBanco')->widget(Select2::classname(), [
                                                                                'data' => ArrayHelper::map(Banco::find()->all(), 'IdBanco', 'DescripcionBanco'),
                                                                                'language' => 'es',
                                                                                'options' => ['placeholder' => ' Selecione ...'],
                                                                                'pluginOptions' => [
                                                                                    'allowClear' => true
                                                                                ],
                                                                            ]);
                                                                            ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="col-lg-6">
                                                    <section class="panel">
                                                        <header class="panel-heading">
                                                            DEDUCCIONES
                                                        </header>
                                                        <div class="panel-body">
                                                            <div>
                                                                <div class="row">
                                                                  <div class="form-group col-lg-12">
                                                                    <br>
                                                                    <div class="form-group col-lg-3">
                                                                       <?= $form->field($model, 'DeducIsssAfp')->checkbox() ?>

                                                                    </div>
                                                                    <div class="form-group col-lg-3">
                                                                         <?= $form->field($model, 'DeducIsssIpsfa')->checkbox() ?>

                                                                    </div>
                                                                    <div class="form-group col-lg-3">
                                                                        <?= $form->field($model, 'NoDependiente')->checkbox() ?>
                                                                    </div>
                                                                    <div class="form-group col-lg-3">
                                                                        <?= $form->field($model, 'Pensionado')->checkbox() ?>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                               </div>
                                           </div>
                                       </div>
                                   </section>
                               </div>
                               <div class="col-lg-12">
                                   <section class="panel">
                                       <header class="panel-heading">
                                           CONTRATACION Y FINALIZACION DE SERVICIO
                                       </header>
                                       <div class="panel-body">
                                           <div>
                                               <div class="row">
                                                   <div class="form-group col-lg-4">
                                                     <?php echo '<label class="control-label">Fecha de Contratacion</label>'; ?>
                                                     <?= DatePicker::widget([
                                                          'model' => $model,
                                                          'attribute' => 'FechaContratacion',
                                                          'template' => '{addon}{input}',
                                                              'clientOptions' => [
                                                                  'autoclose' => true,
                                                                  'format' => 'yyyy/mm/dd'
                                                              ]
                                                        ]);?>
                                                   </div>
                                                   <div class="form-group col-lg-4">
                                                     <?php echo '<label class="control-label">Fecha de Despido</label>'; ?>
                                                     <?= DatePicker::widget([
                                                          'model' => $model,
                                                          'attribute' => 'FechaDespido',
                                                          'template' => '{addon}{input}',
                                                              'clientOptions' => [
                                                                  'autoclose' => true,
                                                                  'format' => 'yyyy/mm/dd'
                                                              ]
                                                        ]);?>
                                                   </div>
                                                   <div class="form-group col-lg-3">
                                                       <br>
                                                           <?= $form->field($model, 'EmpleadoActivo')->checkbox() ?>
                                                   </div>
                                                   <div class="form-group col-lg-6">
                                                      <?php
                                                      echo $form->field($model, 'IdEmpresa')->hiddenInput(['value'=> $idempresa])->label(false);
                                                      ?>
                                                  </div>
                                                  <div class="form-group col-lg-6">
                                                      <?php
                                                      echo $form->field($model, 'IdUsuario')->hiddenInput(['value'=> $idusuario])->label(false);
                                                      ?>
                                                  </div>
                                                  <div class="form-group col-lg-6">
                                                      <?php
                                                      echo $form->field($model, 'FechaTransaccion')->hiddenInput(['value'=> $hoy])->label(false);
                                                      ?>
                                                  </div>
                                               </div>
                                           </div>
                                       </div>
                                   </section>
                               </div>
                             </div>
                         </div>
                     </div>
             </div>
         </div>

   <?php ActiveForm::end(); ?>

        </div>

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $IdEmpresa
 * @property string $NombreEmpresa
 * @property string $Direccion
 * @property string $IdDepartamentos
 * @property string $IdMunicipios
 * @property string $GiroFiscal
 * @property string $NrcEmpresa
 * @property string $NitEmpresa
 * @property string $Representante
 * @property string $EmpleadoActivo
 * @property string $NuPatronal
 * @property string $ImagenEmpresa
 *
 * @property Accionpersonal[] $accionpersonals
 * @property Aguinaldos[] $aguinaldos
 * @property Anticipos[] $anticipos
 * @property Bonos[] $bonos
 * @property Catalogocuentas[] $catalogocuentas
 * @property Comisiones[] $comisiones
 * @property Configuraciongeneral[] $configuraciongenerals
 * @property Empleado[] $empleados
 * @property Departamentos $departamentos
 * @property Municipios $municipios
 * @property Events[] $events
 * @property Honorario[] $honorarios
 * @property Horasextras[] $horasextras
 * @property Incapacidad[] $incapacidads
 * @property Indemnizacion[] $indemnizacions
 * @property Integracionpeachtree[] $integracionpeachtrees
 * @property Ovisss[] $ovissses
 * @property Parametrosplanilla[] $parametrosplanillas
 * @property Permiso[] $permisos
 * @property Planilla[] $planillas
 * @property Propinas[] $propinas
 * @property Rptplanilla[] $rptplanillas
 * @property Rptplanilla[] $rptplanillas0
 * @property Rptplanilla[] $rptplanillas1
 * @property Rptplanilla[] $rptplanillas2
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NombreEmpresa', 'IdDepartamentos', 'IdMunicipios', 'NrcEmpresa', 'NitEmpresa', 'Representante', 'EmpleadoActivo', 'NuPatronal'], 'string', 'max' => 45],
            [['Direccion'], 'string', 'max' => 500],
            [['GiroFiscal'], 'string', 'max' => 100],
            [['ImagenEmpresa'], 'string', 'max' => 200],
            [['IdDepartamentos'], 'exist', 'skipOnError' => true, 'targetClass' => Departamentos::className(), 'targetAttribute' => ['IdDepartamentos' => 'IdDepartamentos']],
            [['IdMunicipios'], 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['IdMunicipios' => 'IdMunicipios']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdEmpresa' => 'Id Empresa',
            'NombreEmpresa' => 'Nombre Empresa',
            'Direccion' => 'Direccion',
            'IdDepartamentos' => 'Id Departamentos',
            'IdMunicipios' => 'Id Municipios',
            'GiroFiscal' => 'Giro Fiscal',
            'NrcEmpresa' => 'Nrc Empresa',
            'NitEmpresa' => 'Nit Empresa',
            'Representante' => 'Representante',
            'EmpleadoActivo' => 'Empleado Activo',
            'NuPatronal' => 'Nu Patronal',
            'ImagenEmpresa' => 'Imagen Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccionpersonals()
    {
        return $this->hasMany(Accionpersonal::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAguinaldos()
    {
        return $this->hasMany(Aguinaldos::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnticipos()
    {
        return $this->hasMany(Anticipos::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBonos()
    {
        return $this->hasMany(Bonos::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogocuentas()
    {
        return $this->hasMany(Catalogocuentas::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComisiones()
    {
        return $this->hasMany(Comisiones::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguraciongenerals()
    {
        return $this->hasMany(Configuraciongeneral::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentos()
    {
        return $this->hasOne(Departamentos::className(), ['IdDepartamentos' => 'IdDepartamentos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipios()
    {
        return $this->hasOne(Municipios::className(), ['IdMunicipios' => 'IdMunicipios']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHonorarios()
    {
        return $this->hasMany(Honorario::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorasextras()
    {
        return $this->hasMany(Horasextras::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncapacidads()
    {
        return $this->hasMany(Incapacidad::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndemnizacions()
    {
        return $this->hasMany(Indemnizacion::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegracionpeachtrees()
    {
        return $this->hasMany(Integracionpeachtree::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOvissses()
    {
        return $this->hasMany(Ovisss::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParametrosplanillas()
    {
        return $this->hasMany(Parametrosplanilla::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermisos()
    {
        return $this->hasMany(Permiso::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanillas()
    {
        return $this->hasMany(Planilla::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropinas()
    {
        return $this->hasMany(Propinas::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRptplanillas()
    {
        return $this->hasMany(Rptplanilla::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRptplanillas0()
    {
        return $this->hasMany(Rptplanilla::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRptplanillas1()
    {
        return $this->hasMany(Rptplanilla::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRptplanillas2()
    {
        return $this->hasMany(Rptplanilla::className(), ['IdEmpresa' => 'IdEmpresa']);
    }
}

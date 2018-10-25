<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "configuraciongeneral".
 *
 * @property int $IdConfiguracion
 * @property string $SalarioMinimo
 * @property int $ComisionesConfig
 * @property int $HorasExtrasConfig
 * @property int $BonosConfig
 * @property int $HonorariosConfig
 * @property int $IdUsuario
 * @property int $IdEmpresa
 *
 * @property Empresa $empresa
 * @property Usuario $usuario
 */
class Configuraciongeneral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'configuraciongeneral';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SalarioMinimo', 'ComisionesConfig', 'HorasExtrasConfig', 'BonosConfig', 'HonorariosConfig'], 'required'],
            [['SalarioMinimo'], 'number'],
            [['ComisionesConfig', 'HorasExtrasConfig', 'BonosConfig', 'HonorariosConfig', 'IdUsuario', 'IdEmpresa'], 'integer'],
            [['IdEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['IdEmpresa' => 'IdEmpresa']],
            [['IdUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['IdUsuario' => 'IdUsuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdConfiguracion' => 'Id Configuracion',
            'SalarioMinimo' => 'Salario Minimo',
            'ComisionesConfig' => 'Comisiones Config',
            'HorasExtrasConfig' => 'Horas Extras Config',
            'BonosConfig' => 'Bonos Config',
            'HonorariosConfig' => 'Honorarios Config',
            'IdUsuario' => 'Id Usuario',
            'IdEmpresa' => 'Id Empresa',
            'empresa.NombreEmpresa' => 'Empresa'

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['IdEmpresa' => 'IdEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['IdUsuario' => 'IdUsuario']);
    }
}

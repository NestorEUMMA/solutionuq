<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horario".
 *
 * @property int $IdHorario
 * @property int $IdEmpleado
 * @property string $JornadaLaboral
 * @property string $DiaLaboral
 * @property string $EntradaLaboral
 * @property string $SalidaLaboral
 * @property int $IdEmpresa
 * @property int $IdUsuario
 *
 * @property Empleado $empleado
 * @property Empresa $empresa
 * @property Usuario $usuario
 */
class Horario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdEmpleado', 'JornadaLaboral', 'DiaLaboral', 'EntradaLaboral', 'SalidaLaboral'], 'required'],
            [['IdEmpleado', 'IdEmpresa', 'IdUsuario'], 'integer'],
            [['JornadaLaboral', 'DiaLaboral', 'EntradaLaboral', 'SalidaLaboral'], 'string', 'max' => 15],
            [['IdEmpleado'], 'exist', 'skipOnError' => true, 'targetClass' => Empleado::className(), 'targetAttribute' => ['IdEmpleado' => 'IdEmpleado']],
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
            'IdHorario' => 'Horario',
            'IdEmpleado' => 'Empleado',
            'JornadaLaboral' => 'Jornada Laboral',
            'DiaLaboral' => 'Dia Laboral',
            'EntradaLaboral' => 'Entrada',
            'SalidaLaboral' => 'Salida',
            'IdEmpresa' => 'Empresa',
            'IdUsuario' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleado::className(), ['IdEmpleado' => 'IdEmpleado']);
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

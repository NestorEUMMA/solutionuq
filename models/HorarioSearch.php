<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Horario;

/**
 * HorarioSearch represents the model behind the search form of `app\models\Horario`.
 */
class HorarioSearch extends Horario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdHorario', 'IdEmpleado', 'IdEmpresa', 'IdUsuario'], 'integer'],
            [['JornadaLaboral', 'DiaLaboral', 'EntradaLaboral', 'SalidaLaboral'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        include '../include/dbconnect.php';
        $queryempresa = "SELECT IdEmpresa, NombreEmpresa
               FROM empresa
               WHERE IdEmpresa =  '" . $_SESSION['IdEmpresa'] . "'";
            $resultadoempresa = $mysqli->query($queryempresa);
            while ($test = $resultadoempresa->fetch_assoc())
                       {
                           $idempresa = $test['IdEmpresa'];
                           $empresa = $test['NombreEmpresa'];

                       }

        $query = Horario::find()
        ->where([
                '=','IdEmpresa', ''.$idempresa.'']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
                'pagination' => [
        'pagesize' => 100,
    ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdHorario' => $this->IdHorario,
            'IdEmpleado' => $this->IdEmpleado,
            'IdEmpresa' => $this->IdEmpresa,
            'IdUsuario' => $this->IdUsuario,
        ]);

        $query->andFilterWhere(['like', 'JornadaLaboral', $this->JornadaLaboral])
            ->andFilterWhere(['like', 'DiaLaboral', $this->DiaLaboral])
            ->andFilterWhere(['like', 'EntradaLaboral', $this->EntradaLaboral])
            ->andFilterWhere(['like', 'SalidaLaboral', $this->SalidaLaboral]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parametrosplanilla;

/**
 * ParametrosplanillaSearch represents the model behind the search form of `app\models\Parametrosplanilla`.
 */
class ParametrosplanillaSearch extends Parametrosplanilla
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdParametroPlanilla'], 'integer'],
            [['FechaCreacion', 'MesPlanilla', 'PeriodoPlanilla', 'QuincenaPlanilla', 'FechaIni', 'FechaFin', 'Tipo'], 'safe'],
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
        $query = Parametrosplanilla::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IdParametroPlanilla' => $this->IdParametroPlanilla,
        ]);

        $query->andFilterWhere(['like', 'FechaCreacion', $this->FechaCreacion])
            ->andFilterWhere(['like', 'MesPlanilla', $this->MesPlanilla])
            ->andFilterWhere(['like', 'PeriodoPlanilla', $this->PeriodoPlanilla])
            ->andFilterWhere(['like', 'QuincenaPlanilla', $this->QuincenaPlanilla])
            ->andFilterWhere(['like', 'FechaIni', $this->FechaIni])
            ->andFilterWhere(['like', 'FechaFin', $this->FechaFin])
            ->andFilterWhere(['like', 'Tipo', $this->Tipo]);

        return $dataProvider;
    }
}

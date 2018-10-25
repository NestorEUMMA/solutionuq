<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Configuraciongeneral;

/**
 * ConfiguraciongeneralSearch represents the model behind the search form of `app\models\Configuraciongeneral`.
 */
class ConfiguraciongeneralSearch extends Configuraciongeneral
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdConfiguracion', 'ComisionesConfig', 'HorasExtrasConfig', 'BonosConfig', 'HonorariosConfig', 'IdUsuario', 'IdEmpresa'], 'integer'],
            [['SalarioMinimo'], 'number'],
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
        $query = Configuraciongeneral::find();

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
            'IdConfiguracion' => $this->IdConfiguracion,
            'SalarioMinimo' => $this->SalarioMinimo,
            'ComisionesConfig' => $this->ComisionesConfig,
            'HorasExtrasConfig' => $this->HorasExtrasConfig,
            'BonosConfig' => $this->BonosConfig,
            'HonorariosConfig' => $this->HonorariosConfig,
            'IdUsuario' => $this->IdUsuario,
            'IdEmpresa' => $this->IdEmpresa,
        ]);

        return $dataProvider;
    }
}

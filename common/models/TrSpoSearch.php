<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TrSpo;

/**
 * TrSpoSearch represents the model behind the search form of `common\models\TrSpo`.
 */
class TrSpoSearch extends TrSpo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TrSpo_id', 'MsUnit_id', 'TrSpo_created_by', 'TrSpo_updated_by', 'TrSpo_created_at', 'TrSpo_updated_at'], 'integer'],
            [['TrSpo_name', 'TrSpo_type', 'TrSpo_additional_text', 'TrSpo_file'], 'safe'],
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
        $query = TrSpo::find();

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
            'TrSpo_id' => $this->TrSpo_id,
            'MsUnit_id' => $this->MsUnit_id,
            'TrSpo_created_by' => $this->TrSpo_created_by,
            'TrSpo_updated_by' => $this->TrSpo_updated_by,
            'TrSpo_created_at' => $this->TrSpo_created_at,
            'TrSpo_updated_at' => $this->TrSpo_updated_at,
        ]);

        $query->andFilterWhere(['like', 'TrSpo_name', $this->TrSpo_name])
            ->andFilterWhere(['like', 'TrSpo_type', $this->TrSpo_type])
            ->andFilterWhere(['like', 'TrSpo_additional_text', $this->TrSpo_additional_text])
            ->andFilterWhere(['like', 'TrSpo_file', $this->TrSpo_file]);

        return $dataProvider;
    }
}

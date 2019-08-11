<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\KuisionerResult;

/**
 * KuisionerResultSearch represents the model behind the search form of `backend\models\KuisionerResult`.
 */
class KuisionerResultSearch extends KuisionerResult
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_kuisioner', 'result', 'id_tiket', 'role'], 'safe'],
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
        $query = KuisionerResult::find();

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
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'id_kuisioner', $this->id_kuisioner])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'id_tiket', $this->id_tiket])
            ->andFilterWhere(['like', 'role', $this->role]);

        return $dataProvider;
    }
}

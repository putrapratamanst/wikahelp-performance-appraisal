<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblSubTiket;

/**
 * TblSubTiketSearch represents the model behind the search form of `backend\models\TblSubTiket`.
 */
class TblSubTiketSearch extends TblSubTiket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_sub_tiket'], 'integer'],
            [['id_tiket', 'id_alternatif', 'id_kriteria', 'id_sub_kriteria', 'status_sub_tiket', 'notif_man'], 'safe'],
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
        $query = TblSubTiket::find();

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
            'id_sub_tiket' => $this->id_sub_tiket,
        ]);

        $query->andFilterWhere(['like', 'id_tiket', $this->id_tiket])
            ->andFilterWhere(['like', 'id_alternatif', $this->id_alternatif])
            ->andFilterWhere(['like', 'id_kriteria', $this->id_kriteria])
            ->andFilterWhere(['like', 'id_sub_kriteria', $this->id_sub_kriteria])
            ->andFilterWhere(['like', 'status_sub_tiket', $this->status_sub_tiket])
            ->andFilterWhere(['like', 'notif_man', $this->notif_man]);

        return $dataProvider;
    }
}

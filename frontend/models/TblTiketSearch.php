<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblTiket;
use Yii;

/**
 * TblTiketSearch represents the model behind the search form of `frontend\models\TblTiket`.
 */
class TblTiketSearch extends TblTiket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tiket', 'id_alternatif', 'wkt_tiket', 'tgl_tiket', 'status_tiket'], 'safe'],
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
        $username = Yii::$app->user->identity->username;
        $query = TblTiket::find()->joinWith(['alternatif.user'])->where(['user.username' => $username]);
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
            'tgl_tiket' => $this->tgl_tiket,
        ]);

        $query->andFilterWhere(['like', 'id_tiket', $this->id_tiket])
            ->andFilterWhere(['like', 'id_alternatif', $this->id_alternatif])
            ->andFilterWhere(['like', 'wkt_tiket', $this->wkt_tiket])
            ->andFilterWhere(['like', 'status_tiket', $this->status_tiket]);

        return $dataProvider;
    }
}

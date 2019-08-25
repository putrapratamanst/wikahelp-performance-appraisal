<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblTiket;
use common\helpers\Constant;
use Yii;

/**
 * TblTiketSearch represents the model behind the search form of `backend\models\TblTiket`.
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
    public function search($params, $nama_alternatif = NULL)
    {   
        // $name = Yii::$app->user->identity->username;
        // if ($name == "mansup")
        // {
        //     $query = TblTiket::find()->where(['status_tiket' => Constant::STATUS_DONE]);
        // } else {
            if($nama_alternatif)
            {
                $query = TblTiket::find()->joinWith(['alternatif.user'])->where(['user.username' => $nama_alternatif]);

            } else {

                $query = TblTiket::find();
            }
        // }

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
            ->andFilterWhere(['like', 'status_tiket', $this->status_tiket])
            ->orderBy(['id_tiket' => SORT_DESC]);

        return $dataProvider;
    }

    public function searchTechSup($params, $nama_alternatif = NULL)
    {   
        $name = Yii::$app->user->identity->username;
        // if ($name == "mansup")
        // {
        //     $query = TblTiket::find()->where(['status_tiket' => Constant::STATUS_DONE]);
        // } else {
           
        $query = TblTiket::find()->where(['approver' => $name]);
            
        // }

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
            ->andFilterWhere(['like', 'status_tiket', $this->status_tiket])
            ->orderBy(['id_tiket' => SORT_DESC]);

        return $dataProvider;
    }
    public function searchTechSupTersedia($params, $nama_alternatif = NULL)
    {   
        $query = TblTiket::find()->where(['status_tiket' => Constant::STATUS_SUBMIT])->andWhere(['approver'=> NULL]);
            
        // }

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
            ->andFilterWhere(['like', 'status_tiket', $this->status_tiket])
            ->orderBy(['id_tiket' => SORT_DESC]);

        return $dataProvider;
    }

    public function searchSelesai($params, $nama_alternatif = NULL)
    {   
        // $name = Yii::$app->user->identity->username;
        // if ($name == "mansup")
        // {
        //     $query = TblTiket::find()->where(['status_tiket' => Constant::STATUS_DONE]);
        // } else {
            if($nama_alternatif)
            {
                $query = TblTiket::find()->joinWith(['alternatif.user'])->where(['user.username' => $nama_alternatif])->where(['status_tiket' => Constant::STATUS_DONE]);

            } else {

                $query = TblTiket::find()->where(['status_tiket' => Constant::STATUS_DONE]);
            }
        // }

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
            ->andFilterWhere(['like', 'status_tiket', $this->status_tiket])
            ->orderBy(['id_tiket' => SORT_DESC]);

        return $dataProvider;
    }

    public function searchProses($params, $nama_alternatif = NULL)
    {   
        // $name = Yii::$app->user->identity->username;
        // if ($name == "mansup")
        // {
        //     $query = TblTiket::find()->where(['status_tiket' => Constant::STATUS_DONE]);
        // } else {
            if($nama_alternatif)
            {
                $query = TblTiket::find()->joinWith(['alternatif.user'])->where(['user.username' => $nama_alternatif])->where(['status_tiket' => Constant::STATUS_PROCESS]);

            } else {

                $query = TblTiket::find()->where(['status_tiket' => Constant::STATUS_PROCESS]);
            }
        // }

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
            ->andFilterWhere(['like', 'status_tiket', $this->status_tiket])
            ->orderBy(['id_tiket' => SORT_DESC]);

        return $dataProvider;
    }

    public function searchDiterima($params, $nama_alternatif = NULL)
    {   
        // $name = Yii::$app->user->identity->username;
        // if ($name == "mansup")
        // {
        //     $query = TblTiket::find()->where(['status_tiket' => Constant::STATUS_DONE]);
        // } else {
            if($nama_alternatif)
            {
                $query = TblTiket::find()->joinWith(['alternatif.user'])->where(['user.username' => $nama_alternatif])->where(['status_tiket' => Constant::STATUS_SUBMIT]);

            } else {

                $query = TblTiket::find()->where(['status_tiket' => Constant::STATUS_SUBMIT]);
            }
        // }

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
            ->andFilterWhere(['like', 'status_tiket', $this->status_tiket])
            ->orderBy(['id_tiket' => SORT_DESC]);

        return $dataProvider;
    }
}

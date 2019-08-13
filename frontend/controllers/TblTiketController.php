<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TblTiket;
use frontend\models\TblKriteria;
use frontend\models\TblSubKriteria;
use frontend\models\TblTiketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\helpers\Constant;
use frontend\models\TblSubTiket;
use yii\data\ActiveDataProvider;
use frontend\models\KuisionerResult;

/**
 * TblTiketController implements the CRUD actions for TblTiket model.
 */
class TblTiketController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblTiket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblTiketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblTiket model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $subTiket = TblSubTiket::find()->joinWith(['subKriteria','kriteria'])->where(['id_tiket' => $id]);
        
        $statusSubTiket = $subTiket->all();
        $buttonClose = true;
        foreach ($statusSubTiket as $value) {
            if($value['status_sub_tiket'] != Constant::STATUS_DONE)
            {
                $buttonClose = false;
            }
        }
        $kuisioner = KuisionerResult::find()->where(['id_tiket' => $id, 'role' => 4])->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $subTiket,
        ]);
        $peringkat = "";

        if ($model->status_tiket == Constant::STATUS_DONE && $kuisioner)
        {

            $sumRating = 0;
            $dataWithoutNol = [];

            if ($statusSubTiket)
            {
                foreach ($statusSubTiket as $valueSubTiket) {
                    if (!empty($valueSubTiket->rating)){
                        $sumRating += $valueSubTiket->rating;
                    }
                    if ($valueSubTiket->rating != 0)
                    {
                        $dataWithoutNol[] = $valueSubTiket->rating;
                    }
                }
                
                $countRating = empty($dataWithoutNol) ? 0 : count($dataWithoutNol);
                $bobotRating = empty($dataWithoutNol) ? 0 : array_sum($dataWithoutNol);

                $hasilBobotRating = empty($dataWithoutNol) ? 0 : ($bobotRating / $countRating);
    
                $kuisionerUser = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner_result.id_tiket' => $id])->andWhere(['kuisioner.role' => 4])->all();

                $countKuisionerUser = [];
                $jumlahKuisionerUser = 0;
                foreach ($kuisionerUser as $valueKuisionerUser) {
                    $jumlahKuisionerUser += $valueKuisionerUser->result;
                }

                $perkalianKuisionerUser = 10 * $jumlahKuisionerUser;
                $bobotUser = $hasilBobotRating * ($perkalianKuisionerUser / 100);
                echo "<pre>";
                die(print_r($bobotUser));

    
    
                $kuisionerMansup = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner_result.id_tiket' => $id])->andWhere(['kuisioner.role' => 3])->all();
                $countKuisionerMansup = [];
                $jumlahKuisionerMansup = 0;
                foreach ($kuisionerMansup as $valueKuisionerMansup) {
                    $jumlahKuisionerMansup += $valueKuisionerMansup->result;
                }
                $perkalianKuisionerMansup = 10 * $jumlahKuisionerMansup;
                $bobotMansup = $hasilBobotRating * ($perkalianKuisionerMansup / 100);
    
    
                $kuisionerTechsup = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner_result.id_tiket' => $id])->andWhere(['kuisioner.role' => 2])->all();
                $countKuisionerTechsup = [];
                $jumlahKuisionerTechsup = 0;
                foreach ($kuisionerTechsup as $valueKuisionerTechsup) {
                    $jumlahKuisionerTechsup += $valueKuisionerTechsup->result;
                }
                $perkalianKuisionerTechsup = 10 * $jumlahKuisionerTechsup;
                $bobotTechsup = $hasilBobotRating * ($perkalianKuisionerTechsup / 100);
    
                $akhir = $bobotUser + $bobotMansup + $bobotTechsup;

                if ($akhir >= 5)   
                {
                    $peringkat = "Sangat Baik";
                }
                if ($akhir < 4.99 && $akhir >= 4 )   
                {
                    $peringkat = "Baik";
                }
                if ($akhir <= 3.99 && $akhir >= 3 )   
                {
                    $peringkat = "Cukup Baik";
                }
                if ($akhir <= 2.99 && $akhir >= 2 )   
                {
                    $peringkat = "Kurang Baik";
                }
                if ($akhir < 2 )   
                {
                    $peringkat = "Sangat Kurang Baik";
                }

                if(empty($dataWithoutNol))
                {
                    $peringkat = "";
                }
            }
            
        }
        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'kuisioner' => $kuisioner,
            'buttonClose' => $buttonClose,
            'peringkat' => $peringkat,
        ]);
    }

    /**
     * Creates a new TblTiket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblTiket();
        $model->id_tiket = $model->reformattedId();
        $model->id_alternatif = $model->find()->select('tbl_alternatif.id_alternatif')->joinWith('alternatif')->one()['id_alternatif'];
        $model->wkt_tiket = date("H:i:s");
        $model->tgl_tiket = date("Y-m-d");
        $model->status_tiket = Constant::STATUS_PROCESS;

        $kriteria = TblKriteria::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();

            foreach ($post['TblTiket'] as $key => $value) {
                if (!empty($value)){
                foreach ($value as $values) {
                    $findKriteria = TblSubKriteria::find()->where(['id_sub_kriteria' => $values])->one();
                    $subTiket = new TblSubTiket();
                    $subTiket->setAttributes([
                        'id_tiket'      => $model->id_tiket,
                        'id_alternatif' => $model->id_alternatif,
                        'id_kriteria' => $findKriteria  ['id_kriteria'],
                        'id_sub_kriteria' => $values,
                        'status' => Constant::STATUS_PROCESS,
                        'created_date' => date("Y-m-d")
                    ]);
                    $subTiket->save();
                }
            }
            }

            $model->save();

            return $this->redirect(['view', 'id' => $model->id_tiket]);
        }

        return $this->render('create', [
            'model' => $model,
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Updates an existing TblTiket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tiket]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDone($id_tiket)
    {
        $model = $this->findModel($id_tiket);
        $model->status_tiket = Constant::STATUS_DONE;

        $model->save();

        Yii::$app->session->setFlash('success', "Tiket telah ditutup.");
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionAjukan($id_tiket)
    {
        $model = $this->findModel($id_tiket);
        $model->status_tiket = Constant::STATUS_SUBMIT;

        $model->save();

        Yii::$app->session->setFlash('success', "Tiket telah diajukan.");
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionFormGrid()
    {
        $model = new TblSubTiket();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tiket]);
        }

        return $this->render('_form_grid', [
            'model' => $model,
        ]);
    }



    public function actionStatusSubmit($id)
    {
        $model = $this->findModel($id);
        $model->status_tiket = Constant::STATUS_SUBMIT;

        $model->save();

        return $this->redirect('index');
    }

    public function actionStatusBatal($id)
    {
        $model = $this->findModel($id);
        $model->status_tiket = Constant::STATUS_SUBMIT;

        $model->save();

        return $this->redirect('index');
    }

    /**
     * Deletes an existing TblTiket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblTiket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblTiket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblTiket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

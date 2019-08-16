<?php

namespace backend\controllers;

use Yii;
use backend\models\TblTiket;
use backend\models\TblTiketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\TblSubTiket;
use yii\data\ActiveDataProvider;
use backend\models\KuisionerResult;
use backend\models\TblAlternatifSearch;
use common\helpers\Constant;
use frontend\models\TblAlternatif;
use yii\filters\AccessControl;

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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['*'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

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

    public function actionSelesai()
    {
        $searchModel = new TblTiketSearch();
        $dataProvider = $searchModel->searchSelesai(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionProses()
    {
        $searchModel = new TblTiketSearch();
        $dataProvider = $searchModel->searchProses(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDiterima()
    {
        $searchModel = new TblTiketSearch();
        $dataProvider = $searchModel->searchDiterima(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewByUser($nama_alternatif)
    {
        $searchModel = new TblTiketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $nama_alternatif);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPromothee()
    {
        $searchModel = new TblAlternatifSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('promothee', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionChart()
    {
        $tiket = TblTiket::find()->joinWith(['alternatif.user', 'subTiket'])->where(
            [
                'tbl_tiket.status_tiket' => Constant::STATUS_DONE
            ]
        )->all();

        $sumRating = 0;
        $dataWithoutNol = [];
        $hasil= [];
        if ($tiket) {
            foreach ($tiket as $valueTiket) {
                if ($valueTiket->subTiket) {
                    foreach ($valueTiket->subTiket as $valueSubTiket) {
                        if (!empty($valueSubTiket->rating)) {
                            $sumRating += $valueSubTiket->rating;
                        }
                        if ($valueSubTiket->rating != 0) {
                            $dataWithoutNol[] = $valueSubTiket->rating;
                        }
                    }

                    $countRating = empty($dataWithoutNol) ? 0 : count($dataWithoutNol);
                    $bobotRating = empty($dataWithoutNol) ? 0 : array_sum($dataWithoutNol);

                    $hasilBobotRating = empty($dataWithoutNol) ? 0 : ($bobotRating / $countRating);

                    $kuisionerUser = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner_result.id_tiket' => $valueTiket->id_tiket])->andWhere(['kuisioner.role' => 4])->all();

                    $countKuisionerUser = [];
                    $jumlahKuisionerUser = 0;
                    foreach ($kuisionerUser as $valueKuisionerUser) {
                        $jumlahKuisionerUser += $valueKuisionerUser->result;
                    }
                    $perkalianKuisionerUser = 10 * $jumlahKuisionerUser;
                    $bobotUser = $hasilBobotRating * ($perkalianKuisionerUser / 100);


                    $kuisionerMansup = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner_result.id_tiket' => $valueTiket->id_tiket])->andWhere(['kuisioner.role' => 3])->all();
                    $countKuisionerMansup = [];
                    $jumlahKuisionerMansup = 0;
                    foreach ($kuisionerMansup as $valueKuisionerMansup) {
                        $jumlahKuisionerMansup += $valueKuisionerMansup->result;
                    }
                    $perkalianKuisionerMansup = 10 * $jumlahKuisionerMansup;
                    $bobotMansup = $hasilBobotRating * ($perkalianKuisionerMansup / 100);


                    $kuisionerTechsup = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner_result.id_tiket' => $valueTiket->id_tiket])->andWhere(['kuisioner.role' => 2])->all();
                    $countKuisionerTechsup = [];
                    $jumlahKuisionerTechsup = 0;
                    foreach ($kuisionerTechsup as $valueKuisionerTechsup) {
                        $jumlahKuisionerTechsup += $valueKuisionerTechsup->result;
                    }
                    $perkalianKuisionerTechsup = 10 * $jumlahKuisionerTechsup;
                    $bobotTechsup = $hasilBobotRating * ($perkalianKuisionerTechsup / 100);

                    $akhir = $bobotUser + $bobotMansup + $bobotTechsup;

                    if ($akhir >= 5) {
                        $peringkat = "Sangat Baik";
                        $dataAkhirChart = 
                        [
                            $akhir,0,0,0,0
                        ]; 
                    }
                    if ($akhir < 4.99 && $akhir >= 4) {
                        $peringkat = "Baik";
                        $dataAkhirChart =
                            [
                                0, $akhir, 0, 0, 0
                            ]; 

                    }
                    if ($akhir <= 3.99 && $akhir >= 3) {
                        $peringkat = "Cukup Baik";
                        $dataAkhirChart =
                            [
                                0, 0, $akhir, 0, 0
                            ]; 

                    }
                    if ($akhir <= 2.99 && $akhir >= 2) {
                        $peringkat = "Kurang Baik";
                        $dataAkhirChart =
                            [
                                0, 0, 0, $akhir, 0
                            ]; 

                    }
                    if ($akhir < 2) {
                        $peringkat = "Sangat Kurang Baik";
                        $dataAkhirChart =
                            [
                                0, 0, 0, 0, $akhir
                            ]; 
                    }

                    if (empty($dataWithoutNol)) {
                        $peringkat = "";
                        $dataAkhirChart =
                            [
                                0, 0, 0, 0, 0
                            ]; 
                    }

                    $hasil[]= 
                    [
                        'name' => $valueTiket->id_tiket,
                        'data' => $dataAkhirChart
                    ];

                }
            }
        }
        // echo"<pre>";print_r($hasil);
        // die();

        $result = 
        [

            [
                'name' => "adf",
                'data' => [0, 0, 4],
            ],
            [
                'name' => "gus",
                'data' => [12, 2, 4],
            ],
        ];
        
        return json_encode($hasil);
    }

    /**
     * Displays a single TblTiket model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $kuisioner = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuision  er.role' => 4])->where(['id_tiket' => $id])->all();
        $subTiket = TblSubTiket::find()->joinWith(['subKriteria', 'kriteria'])->where(['id_tiket' => $id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $subTiket,
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'kuisioner' => $kuisioner,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tiket]);
        }

        return $this->render('create', [
            'model' => $model,
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

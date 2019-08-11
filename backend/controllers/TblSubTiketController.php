<?php

namespace backend\controllers;

use Yii;
use backend\models\TblSubTiket;
use backend\models\TblSubTiketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\User;
use backend\models\TblAlternatif;
use common\helpers\Constant;

/**
 * TblSubTiketController implements the CRUD actions for TblSubTiket model.
 */
class TblSubTiketController extends Controller
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
     * Lists all TblSubTiket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblSubTiketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSubTiket model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblSubTiket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblSubTiket();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sub_tiket]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblSubTiket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_sub_tiket]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionEmail($id_sub_tiket)
    {
        $model = $this->findModel($id_sub_tiket);
        $model->notif_man = "Segera di Selesaikan";
        
        $dataAlternatif = TblAlternatif::find()->where(['id_alternatif' => $model['id_alternatif']])->one();
        $userData = User::find()->where(['username'=> $dataAlternatif['username']])->one();
        $model->save();

        Yii::$app->mailer->compose()
            ->setFrom('putrapratamanst@gmail.com')
            ->setTo($userData['email'])
            ->setSubject('Pengingat Tiket')
            ->setTextBody('Harap Selesaikan Sub Tiket Anda')
            // ->setHtmlBody('<b>HTML content</b>')
            ->send();

            Yii::$app->session->setFlash('success', "Email notifikasi telah terkirim.");
        return $this->goBack(Yii::$app->request->referrer);

    }

    public function actionDone($id_sub_tiket)
    {
        $model = $this->findModel($id_sub_tiket);
        $model->status_sub_tiket = Constant::STATUS_DONE;
        
        $model->save();

        Yii::$app->session->setFlash('success', "Data telah tersimpan.");
        return $this->goBack(Yii::$app->request->referrer);

    }

    /**
     * Deletes an existing TblSubTiket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblSubTiket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSubTiket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSubTiket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

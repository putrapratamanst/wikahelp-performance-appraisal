<?php

namespace frontend\controllers;

use Yii;
use frontend\models\KuisionerResult;
use frontend\models\KuisionerResultSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Kuisioner;

/**
 * KuisionerResultController implements the CRUD actions for KuisionerResult model.
 */
class KuisionerResultController extends Controller
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
     * Lists all KuisionerResult models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KuisionerResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KuisionerResult model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tiket)
    {
        $kuisioner = KuisionerResult::find()->joinWith(['kuisioner'])->where(['kuisioner.role' => 4])->all();

        return $this->render('view', [
            'kuisioner' => $kuisioner
        ]);
    }

    /**
     * Creates a new KuisionerResult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_tiket)
    {
        $model = new KuisionerResult();
        $kuisioner = Kuisioner::find()->where(['role' => 4])->all();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();


            $count= count($post['KuisionerResult']);
            $odd=array();
            $even=array();
            $modelTemp=array();
            $countOdd=1;

            foreach ($post['KuisionerResult']['tempKuisioner'] as $valueKuisioner) {
                if ($countOdd % 2 == 1) {
                    $odd[] = $valueKuisioner;
                } else {
                    $even[] = $valueKuisioner;
                }

                $countOdd++;
            }
            
            foreach ($even as $value) {

                if ($value == "")
                {
                     Yii::$app->session->setFlash('danger', "Semua pertanyaan harus dijawab.");
                    return $this->render('create', [
                        'model' => $model,
                        'kuisioner' => $kuisioner,
                    ]);

                }

                foreach ($post['KuisionerResult']['id_kuisioner'] as  $valueIdKuisioner) {
                    
                    $modelAttribute = [
                        'id_tiket' => $id_tiket,
                        'result' => $value,
                        'id_kuisioner' => $valueIdKuisioner
                    ] ;

                    // echo"<pre>";print_r($model);
                }
                array_push($modelTemp, $modelAttribute);
            }


            // echo"<pre>";print_r($modelTemp);
            // $model->save();
            // die();


            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'kuisioner' => $kuisioner,
        ]);
    }

    /**
     * Updates an existing KuisionerResult model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing KuisionerResult model.
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
     * Finds the KuisionerResult model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KuisionerResult the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KuisionerResult::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

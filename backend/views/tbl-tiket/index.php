<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Constant;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblTiketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Tikets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tiket-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
<?php
    $name = Yii::$app->user->identity->username;
    if ($name == "mansup")
    {

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tiket',
            'id_alternatif',
            'wkt_tiket',
            'tgl_tiket',
        [
            'attribute' => 'status_tiket',
            'value' => function ($model) {
                if ($model->status_tiket == Constant::STATUS_PROCESS) {
                    return "Belum di Proses";
                }

                return $model->status_tiket;
            },
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'buttons' => [
                'view' => function ($url, $model, $key) {
                        if ($model->status_tiket !== Constant::STATUS_PROCESS) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            ['tbl-tiket/view', 'id' => $model->id_tiket]
                        );
                    }
                },
            ],
            'template' => '{view} {batal} {proses}'


        ],        
        ],
    ]); 
    }?>


<?php
    $name = Yii::$app->user->identity->username;
    if ($name == "techsup")
    {

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tiket',
            'id_alternatif',
            'wkt_tiket',
            'tgl_tiket',
        [
            'attribute' => 'status_tiket',
            'value' => function ($model) {
                if ($model->status_tiket == Constant::STATUS_PROCESS) {
                    return "Belum di Proses";
                }

                return $model->status_tiket;
            },
        ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    // 'batal' => function ($url, $model, $key) {
                    //     if ($model->status_tiket == Constant::STATUS_SUBMIT) {
                    //         return Html::a(
                    //             '<span class="glyphicon glyphicon-remove"></span>',
                    //             ['tbl-tiket/status-batal', 'id' => $model->id_tiket],
                    //             [
                    //                 'data' => [
                    //                     'confirm' => 'Apakah Anda yakin ingin membatalkan tiket ini?',
                    //                     'method' => 'post',
                    //                 ]
                    //             ]
                    //         );
                    //     }
                    // },
                    'view' => function ($url, $model, $key) {
                        if ($model->status_tiket !== Constant::STATUS_PROCESS) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-eye-open"></span>',
                                ['tbl-tiket/view', 'id' => $model->id_tiket]
                            );
                        }
                    },
                ],
                'template' => '{view} {batal} {proses}'


            ],        
        ],
    ]); 
    }?>



</div>

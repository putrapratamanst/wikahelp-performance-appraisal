<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Constant;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblTiketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Tiket '. ucwords(Yii::$app->getRequest()->getQueryParam('nama_alternatif'));
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tiket-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php
    $role = Yii::$app->user->identity->role;
    if ($role == 3) {

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary'=>'',
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
    } ?>


    <?php
    $role = Yii::$app->user->identity->role;
    if ($role == 2) {

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary' => '',

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
    } ?>



</div>

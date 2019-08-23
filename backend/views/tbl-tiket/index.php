<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\Constant;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblTiketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Tiket';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tiket-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php
    $role = Yii::$app->user->identity->role;
    if ($role == 3 || $role == 1) {


        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'summary'=> '',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_alternatif',
                'nm_alternatif',
                // 'username',
                // 'password',
                //'email_alternatif:email',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-eye-open"></span> Lihat Tiket',
                                ['tbl-tiket/view-by-user', 'nama_alternatif' => $model->username]
                            );
                        },
                    ],
                    'template' => '{view}'


                ],
            ],
        ]);

        // echo GridView::widget([
        //     'dataProvider' => $dataProvider,
        //     'filterModel' => $searchModel,
        //     'columns' => [
        //         ['class' => 'yii\grid\SerialColumn'],

        //         'id_tiket',
        //         'id_alternatif',
        //         'wkt_tiket',
        //         'tgl_tiket',
        //     [
        //         'attribute' => 'status_tiket',
        //         'value' => function ($model) {
        //             if ($model->status_tiket == Constant::STATUS_PROCESS) {
        //                 return "Belum di Proses";
        //             }

        //             return $model->status_tiket;
        //         },
        //     ],

        //     [
        //         'class' => 'yii\grid\ActionColumn',
        //         'buttons' => [
        //             'view' => function ($url, $model, $key) {
        //                     if ($model->status_tiket !== Constant::STATUS_PROCESS) {
        //                     return Html::a(
        //                         '<span class="glyphicon glyphicon-eye-open"></span>',
        //                         ['tbl-tiket/view', 'id' => $model->id_tiket]
        //                     );
        //                 }
        //             },
        //         ],
        //         'template' => '{view} {batal} {proses}'


        //     ],        
        //     ],
        // ]); 
    } ?>


    <?php
    $role = Yii::$app->user->identity->role;
    if ($role == 2) {

        // echo GridView::widget([
        //     'dataProvider' => $dataProvider,
        //     'filterModel' => $searchModel,
        //     'columns' => [
        //         ['class' => 'yii\grid\SerialColumn'],

        //         'id_tiket',
        //         'id_alternatif',
        //         'wkt_tiket',
        //         'tgl_tiket',
        //     [
        //         'attribute' => 'status_tiket',
        //         'value' => function ($model) {
        //             if ($model->status_tiket == Constant::STATUS_PROCESS) {
        //                 return "Belum di Proses";
        //             }

        //             return $model->status_tiket;
        //         },
        //     ],

        //         [
        //             'class' => 'yii\grid\ActionColumn',
        //             'buttons' => [
        //                 // 'batal' => function ($url, $model, $key) {
        //                 //     if ($model->status_tiket == Constant::STATUS_SUBMIT) {
        //                 //         return Html::a(
        //                 //             '<span class="glyphicon glyphicon-remove"></span>',
        //                 //             ['tbl-tiket/status-batal', 'id' => $model->id_tiket],
        //                 //             [
        //                 //                 'data' => [
        //                 //                     'confirm' => 'Apakah Anda yakin ingin membatalkan tiket ini?',
        //                 //                     'method' => 'post',
        //                 //                 ]
        //                 //             ]
        //                 //         );
        //                 //     }
        //                 // },
        //                 'view' => function ($url, $model, $key) {
        //                     if ($model->status_tiket !== Constant::STATUS_PROCESS) {
        //                         return Html::a(
        //                             '<span class="glyphicon glyphicon-eye-open"></span>',
        //                             ['tbl-tiket/view', 'id' => $model->id_tiket]
        //                         );
        //                     }
        //                 },
        //             ],
        //             'template' => '{view} {batal} {proses}'


        //         ],        
        //     ],
        // ]); 

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_alternatif',
                'nm_alternatif',
                // 'username',
                // 'password',
                //'email_alternatif:email',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-eye-open"></span> Lihat Tiket',
                                ['tbl-tiket/view-by-user', 'nama_alternatif' => $model->username]
                            );
                        },
                    ],
                    'template' => '{view}'


                ],
            ],
        ]);
    } ?>



</div>

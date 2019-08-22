<?php

use frontend\models\TblTiket;
use common\helpers\Constant;

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */

?>


<div class="site-index">

    <div id="container" style="width:100%; height:400px;"></div>

    <?php if (Yii::$app->user->identity->username == "admin") { ?>
    <!-- <div class="body-content">
            <div class="row test ">
                <div class="col-sm-4">
                    <center><a class="btn btn-default" href="/kuisioner/index">Kelola Kuisioner </a></center>
                </div>
                <div class="col-sm-4">
                    <center><a class="btn btn-default" href="/tbl-alternatif/index">Kelola Alternatif </a></center>
                </div>
                <div class="col-sm-4">
                    <center><a class="btn btn-default" href="/tbl-user/index">Kelola Admin </a></center>
                </div>
            </div>
            <div class="row test ">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <center> <a class="btn btn-default" href="/tbl-kriteria/index">Kelola Kriteria </a></center>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div> -->
    <?php } ?>
    <?php if (Yii::$app->user->identity->username == "mansup" || Yii::$app->user->identity->username == "techsup") { ?>
    <div class="row">
        <div class="col-lg-8">


            <?php
                $username = Yii::$app->user->identity->username;
                $tiket = TblTiket::find()->joinWith(['alternatif.user'])->where(['user.username' => $username]);
                $idTiket = [];
                foreach ($tiket->all() as $key => $value) {
                    $idTiket[] = $value['id_tiket'];
                }

                echo \dosamigos\highcharts\HighCharts::widget([
                    'clientOptions' => [
                        'chart' => [
                            'type' => 'column'
                        ],
                        'title' => [
                            'text' => 'Index Performance'
                        ],
                        'xAxis' => [
                            'categories' =>
                            [
                                'Desta',
                                'Aisyah',
                                'Kukuh',
                                'Ahmad',
                                'Wahyu',
                                'Fauzan',
                                'Rizal',
                            ]
                        ],
                        'yAxis' => [
                            'title' => [
                                'text' => 'Nilai'
                            ]
                        ],
                        'series' => [
                            ['name' => 'Sangat Kurang Baik', 'data' => [0, 0, 5, 0, 0, 0, 0,]],
                            ['name' => 'Kurang Baik', 'data' => [0, 0, 0, 0, 4, 0, 0]],
                            ['name' => 'Cukup Baik', 'data' => [0, 0, 0, 3, 0, 0, 0]],
                            ['name' => 'Baik', 'data' => [1, 0, 0, 0, 0, 0, 0]],
                            ['name' => 'Sangat Baik', 'data' => [0, 2, 0, 0, 0, 0, 0]],
                        ]
                    ]
                ]);
                ?>
        </div>
        <br>
        <?php
            $selesai = $tiket->where(['status_tiket' => Constant::STATUS_DONE])->count();
            $proses = $tiket->where(['status_tiket' => Constant::STATUS_PROCESS])->count();
            $submit = $tiket->where(['status_tiket' => Constant::STATUS_SUBMIT])->count();
            ?>
        <!-- 
                <p><a class="btn btn-default"> :</a></p>
                <p><a class="btn btn-default">Tiket Diterima : </a></p>
                <p><a class="btn btn-default">Tiket Diterima : </a></p> -->
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="/tbl-tiket/selesai">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tiket Selesai</span>
                        <span class="info-box-number"> <?= $selesai; ?><small></small></span>
                    </div>
                </a>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="/tbl-tiket/proses">
                    <span class="info-box-icon bg-red"><i class="fa fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tiket Diterima</span>
                        <span class="info-box-number"><?= $proses; ?></span>
                    </div>
                </a>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="/tbl-tiket/diterima">

                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tiket Belum Diproses</span>
                        <span class="info-box-number"><?= $submit; ?></span>
                    </div>
                </a>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
    </div>

    <!-- <div class="body-content">
            <div class="row test ">
                <div class="col-sm-4">
                    <center><a class="btn btn-default" href="/tbl-tiket/index">Kelola Tiket </a></center>
                </div>
                <div class="col-sm-4">
                    <center><a class="btn btn-default" href="/tbl-alternatif/index">Kelola Alternatif </a></center>
                </div>
                <div class="col-sm-4">
                    <center><a class="btn btn-default" href="/tbl-user/index">Kelola Admin </a></center>
                </div>
            </div>
            <div class="row test ">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <center> <a class="btn btn-default" href="/tbl-kriteria/index">Kelola Kriteria </a></center>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>  -->
    <?php } ?>
    <?php if (Yii::$app->user->identity->username == "techsup") { ?>
    <!-- <div class="body-content">
                <div class="row test ">
                    <div class="col-sm-6">
                        <center><a class="btn btn-default" href="/tbl-tiket/index">Kelola Tiket </a></center>
                    </div>
                    <div class="col-sm-6">
                        <center><a class="btn btn-default" href="/tbl-alternatif/index">Kelola Alternatif </a></center>
                    </div>
                </div>
                <div class="row test ">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <center> <a class="btn btn-default" href="/tbl-kriteria/index">Kelola Kriteria </a></center>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </div> -->
    <?php } ?>
</div>

<style>
    .test [class*="col-"] {
        padding: 15px;
        background-color: #f1f1f1;
        border: 1px solid #D8D8D8;
    }
</style>

<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">List Tiket</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">


                        <?php
                        $name = Yii::$app->user->identity->username;
                        if ($name == "mansup") {

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
                        } ?>


                        <?php
                        $name = Yii::$app->user->identity->username;
                        if ($name == "techsup") {

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
                        } ?>



                </div>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $.getJSON('tbl-tiket/chart', function(chartData) {
            var myChart = Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Grafik Performa'
                },
                xAxis: {
                    categories: ['Sangat Baik', 'Baik', 'Cukup Baik', 'Kurang Baik', 'Sangat Kurang Baik']
                },
                yAxis: {
                    title: {
                        text: '360 Degree'
                    }
                },
                // series: [{
                //     "name": 'TK-0021',
                //     "data": [
                //         0,
                //         0,
                //         3.4714285714285715,
                //         0,
                //         0
                //     ]
                // }, {
                //     "name": 'TK-0022',
                //     "data": [
                //         0,
                //         0,
                //         0,
                //         3.4714285714285715,
                //         0
                //     ]
                // }]
                series: chartData
            });
        })
    });
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>

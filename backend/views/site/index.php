<?php
use frontend\models\TblTiket;
use common\helpers\Constant;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang <?= Yii::$app->user->identity->username ?>!</h1>

        <p class="lead">Ini adalah halaman kelola <?= Yii::$app->user->identity->username ?>.</p>

    </div>
    <?php if (Yii::$app->user->identity->username == "admin") { ?>
        <div class="body-content">
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
        </div>
    <?php } ?>
    <?php if (Yii::$app->user->identity->username == "mansup") { ?>
        <div class="row">
            <div class="col-lg-8">
                <h2>Grafik Performa</h2>


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
                            ['name' => 'Sangat Kurang Baik', 'data' => [0, 0, 5, 0, 0, 0 ,0,]],
                            ['name' => 'Kurang Baik', 'data' => [0, 0, 0, 0, 4, 0, 0]],
                            ['name' => 'Cukup Baik', 'data' => [0, 0, 0, 3, 0, 0, 0]],
                            ['name' => 'Baik', 'data' => [1, 0, 0, 0, 0, 0, 0]],
                            ['name' => 'Sangat Baik', 'data' => [0, 2, 0, 0, 0, 0, 0]],
                        ]
                    ]
                ]); ?>
            </div>
            <div class="col-lg-4">
                <h2>Status Tiket</h2>
                <?php
                $selesai = $tiket->where(['status_tiket' => Constant::STATUS_DONE])->count();
                $proses = $tiket->where(['status_tiket' => Constant::STATUS_PROCESS])->count();
                $submit = $tiket->where(['status_tiket' => Constant::STATUS_SUBMIT])->count();
                ?>
                <p>

                    <p><a class="btn btn-default">Tiket Selesai : <?= $selesai; ?></a></p>
                    <p><a class="btn btn-default">Tiket Diterima : <?= $submit; ?></a></p>
                    <p><a class="btn btn-default">Tiket Diterima : <?= $proses; ?></a></p>
            </div>
        </div>


        <div class="body-content">
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
        </div>
    <?php } ?>
    <?php if (Yii::$app->user->identity->username == "techsup") { ?>
        <div class="body-content">
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
        </div>
    <?php } ?>
</div>

<style>
    .test [class*="col-"] {
        padding: 15px;
        background-color: #f1f1f1;
        border: 1px solid #D8D8D8;
    }
</style>

<?php

use frontend\models\TblTiket;
use common\helpers\Constant;

/* @var $this yii\web\View */

$this->title = 'WIKA HELP';
?>
<div class="site-index">

    <div style="text-align:center">
        <marquee><h1>Selamat datang <?= Yii::$app->user->identity->username; ?> !</h1></marquee>
        <p><a class="btn btn-lg btn-success" href="/tbl-tiket/create">Tambah Ticket</a></p>
    </div>

    <div class="body-content">

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
                            'categories' => $idTiket
                        ],
                        'yAxis' => [
                            'title' => [
                                'text' => 'Nilai'
                            ]
                        ],
                        'series' => [
                            ['name' => 'Sangat Kurang Baik', 'data' => [0, 0]],
                            ['name' => 'Kurang Baik', 'data' => [2.40, 0]],
                            ['name' => 'Cukup Baik', 'data' => [0, 0]],
                            ['name' => 'Baik', 'data' => [0, 0]],
                            ['name' => 'Sangat Baik', 'data' => [0, 5]],
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

    </div>
</div>

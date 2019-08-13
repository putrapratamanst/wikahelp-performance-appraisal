<?php

use frontend\models\TblTiket;
use common\helpers\Constant;

/* @var $this yii\web\View */

$this->title = 'WIKA HELP';
?>
<div class="site-index">

    <div style="text-align:center">
        <marquee><h1>Selamat datang <?= Yii::$app->user->identity->username; ?> !</h1></marquee>
        <p><a class="btn btn-lg btn-warning" href="/tbl-tiket/create">Tambah Ticket</a></p>
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
                            'categories' => [
                                'Sangat Kurang Baik', 
                                'Kurang Baik', 
                                'Cukup Baik', 
                                'Baik', 
                                'Sangat Baik', 

                            ]
                        ],
                        'yAxis' => [
                            'title' => [
                                'text' => 'Nilai'
                            ]
                        ],
                        'series' => [
                            ['name' => 'TK-0021', 'data' => [1]],
                            ['name' => 'TK-0022', 'data' => [1]],
                            ['name' => 'TK-0024', 'data' => [0,5]],
                        ]
                    ]
                ]); ?>
            </div>
            <div class="col-lg-4">
                <h2>Status Tiket</h2>
                <?php
                $selesai = $tiket->andWhere(['status_tiket' => Constant::STATUS_DONE])->count();
                $proses = $tiket->andWhere(['status_tiket' => Constant::STATUS_PROCESS])->count();
                $submit = $tiket->andWhere(['status_tiket' => Constant::STATUS_SUBMIT])->count();
                ?>
                <p>

                    <p><a class="btn btn-primary">Tiket Selesai : <?= $selesai; ?></a></p>
                    <p><a class="btn btn-success">Tiket Diterima : <?= $submit; ?></a></p>
                    <p><a class="btn btn-danger">Tiket Diproses : <?= $proses; ?></a></p>
            </div>
        </div>

    </div>
</div>

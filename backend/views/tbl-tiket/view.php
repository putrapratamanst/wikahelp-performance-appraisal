<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\helpers\Constant;
    use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTiket */

$this->title = $model->id_tiket;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-tiket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if ($model->status_tiket == Constant::STATUS_DONE) {

            if ($kuisioner) {
                echo Html::a('Lihat Kuisioner User', ['kuisioner-result/view', 'id_tiket' => $model->id_tiket], ['class' => 'btn btn-default']);
            }
        }

        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tiket',
            'id_alternatif',
            'wkt_tiket',
            'tgl_tiket',
            'status_tiket',
        ],
    ]);
    echo "<h3> Data Masalah </h3>";
    $name = Yii::$app->user->identity->username;
    if($name == "mansup")
    {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                'kriteria.nm_kriteria',
                'subKriteria.nm_sub_kriteria',
            [
                'attribute' => 'created_date',
                'label'     => 'Tanggal Pengerjaan'
            ],

                [
                    'attribute' => 'notif_man',
                    'label' => 'Status',
                    'value' => function($model) 
                    {
                        if ($model->notif_man)
                        {
                            return "Proses  Notif Manager : Segera di Selesaikan";
                        } else {
                            return $model->status_sub_tiket;
                        }
                    }
                ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'email' => function ($url, $model, $key) {
                        if ($model->status_sub_tiket == Constant::STATUS_PROCESS) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-envelope"></span>',
                                ['/tbl-sub-tiket/email', 'id_sub_tiket' => $model->id_sub_tiket],
                                [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Apakah anda yakin ingin mengirim email?',
                                        'method' => 'post',
                                    ],
                                ]
                            );
                        }
                    },
                ],
                'template' => '{email}'
    
    
            ],        
    
            ],
        ]);
    }
    if($name == "techsup")
    {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
    
                'kriteria.nm_kriteria',
                'subKriteria.nm_sub_kriteria',
            [
                'attribute' => 'created_date',
                'label'     => 'Tanggal Pengerjaan'
            ],
                [
                    'attribute' => 'notif_man',
                    'label' => 'Status',
                    'value' => function($model) 
                    {
                        if ($model->notif_man)
                        {
                            return "Proses  Notif Manager : Segera di Selesaikan";
                        } else {
                            return $model->status_sub_tiket;
                        }
                    }
                ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'email' => function ($url, $model, $key) {
                        if ($model->status_sub_tiket == Constant::STATUS_PROCESS) {
                            return Html::a(
                                'Selesai di Kerjakan',
                                ['/tbl-sub-tiket/done', 'id_sub_tiket' => $model->id_sub_tiket],
                                [
                                    'class' => 'btn btn-success',
                                    'data' => [
                                        'confirm' => 'Apakah anda yakin?',
                                        'method' => 'post',
                                    ],
                                ]
                            );
                        }
                    },
                ],
                'template' => '{email}'
    
    
            ],        
    
            ],
        ]);
    }
echo \yii2mod\rating\StarRating::widget([
    'name' => 'input_name',
    'value' => 1,
    'clientOptions' => [
        // Your client options
    ],
]);

    // With model & without ActiveForm
    echo StarRating::widget([
        'name' => 'rating_1',
        'pluginOptions' => [ 'showClear' => false]
    ]);
    ?>

</div>

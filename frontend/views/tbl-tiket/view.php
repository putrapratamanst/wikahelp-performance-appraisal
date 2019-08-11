<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\helpers\Constant;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblTiket */

$this->title = "Data Tiket: ".$model->id_tiket;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-tiket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?php
        if ($model->status_tiket == Constant::STATUS_DONE)
        {
            echo Html::a('Tutup', ['kuisioner-result/create', 'id_tiket' => $model->id_tiket], ['class' => 'btn btn-primary']); 
            
            if ($kuisioner)
            {
                echo Html::a('Lihat Kuisioner', ['kuisioner-result/view', 'id_tiket' => $model->id_tiket], ['class' => 'btn btn-default']);
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
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
    'rowOptions' => function ($model) {
        $datetime1 = date_create($model->created_date);
        $datetime2 = new DateTime('NOW');
        $interval = date_diff($datetime1, $datetime2);
        // echo"<pre>";print_r($);exit();
        if ($interval->d >= 2 && $model->status_sub_tiket == Constant::STATUS_PROCESS) {
            return ['class' => 'danger'];
        }
    },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kriteria.nm_kriteria',
            'subKriteria.nm_sub_kriteria',
            [
                'attribute' => 'created_date',
                'label'     => 'Tanggal Pengerjaan',
                
            ],
        [
            'attribute' => 'notif_man',
            'label' => 'Status',
            'value' => function ($model) {
                if ($model->notif_man) {
                    return "Proses  Notif Manager : Segera di Selesaikan";
                } else {
                    return $model->status_sub_tiket;
                }
            }
        ],
            
        [
            'attribute' => 'notif_man',
            'label' => 'Status',
            'value' => function ($model) {
                
                return  \yii2mod\rating\StarRating::widget([
                    'name' => 'input_name',
                    'value' => 1,
                    'clientOptions' => [
                        // Your client options
                    ],
                ]);
            },
            'format' => 'raw'
        ],
            
     ],
    ]); ?>
    
</div>

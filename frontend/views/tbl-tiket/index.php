<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\helpers\Constant;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblTiketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Tiket';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tiket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Tiket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=> '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tiket',
            'id_alternatif',
            'wkt_tiket',
            'tgl_tiket',
            // 'status_tiket',
            [
                'attribute' => 'status_tiket',
                'value' => function($model)
                {
                    if ($model->status_tiket == Constant::STATUS_PROCESS)
                    {
                        return "Belum di Proses";
                    }

                    return $model->status_tiket;
                },
            ],

        [
            'class' => 'yii\grid\ActionColumn',
            'buttons' => [
                'proses' => function ($url, $model, $key) {
                    if ($model->status_tiket == Constant::STATUS_PROCESS)
                    {
                        return Html::a(
                            '<span class="glyphicon glyphicon-ok"></span>', ['tbl-tiket/status-submit', 'id' => $model->id_tiket],
                         [
                            'data' => [
                            'confirm' => 'Apakah Anda yakin ingin mengajukan tiket ini?',
                            'method' => 'post',
                         ]]);
                    }
                },
                'batal' => function ($url, $model, $key) {
                    if ($model->status_tiket == Constant::STATUS_SUBMIT)
                    {
                        return Html::a(
                            '<span class="glyphicon glyphicon-remove"></span>', ['tbl-tiket/status-batal', 'id' => $model->id_tiket],
                         [
                            'data' => [
                            'confirm' => 'Apakah Anda yakin ingin membatalkan tiket ini?',
                            'method' => 'post',
                         ]]);
                    }
                },
                'view' => function ($url, $model, $key) {
                    if ($model->status_tiket == Constant::STATUS_SUBMIT || $model->status_tiket == Constant::STATUS_DONE )
                    {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>', ['tbl-tiket/view', 'id' => $model->id_tiket]
                        );
                    }
                },
            ],
            'template' => '{view} {batal} {proses}'


        ],        
    ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

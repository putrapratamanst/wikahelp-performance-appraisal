<?php

use frontend\models\TblNilaiPengkajian;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblAlternatifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promothee';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-alternatif-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_alternatif',
            [
                'attribute' => 'kd_alternatif',
                'label' => 'Nilai Prioritas',
                'value' => function($model)
                {
                    $nilai_pengkajian = '0';
                    $id = array(
                        'id_alternatif1' => $model->id_alternatif,
                    );

                    $data_row = TblNilaiPengkajian::find()->where($id)->all();
                    foreach ($data_row as $row) {
                        $nilai_pengkajian += $row->nilai_pengkajian;
                    }
                    $leavingFlowData = number_format((1 / (7 - 1)) * $nilai_pengkajian, 3);


                    $nilai_pengkajian1 = '0';
                    $id1 = array(
                        'id_alternatif2' => $model->id_alternatif,
                    );
                    $data_row1 = TblNilaiPengkajian::find()->where($id1)->all();

                    foreach ($data_row1 as $row1) {
                        $nilai_pengkajian1 += $row1->nilai_pengkajian;
                    }

                    $enteringFlowData = number_format((1 / (7 - 1)) * $nilai_pengkajian1, 3);
                    
                    return $leavingFlowData - $enteringFlowData;

                }
            ],
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
    ]); ?>


</div>

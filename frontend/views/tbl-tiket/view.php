<?php

use backend\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\helpers\Constant;
use kartik\rating\StarRating as KartikStarRating;
use yii2mod\rating\StarRating;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblTiket */

$this->title = "Data Tiket: " . $model->id_tiket;
$this->params['breadcrumbs'][] = ['label' => 'List Tiket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-tiket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    
        <?php
        echo Html::a('Kembali', ['index'], ['class' => 'btn btn-default']);
        echo "\n\n";

        if ($buttonClose == true && $model->status_tiket == Constant::STATUS_SUBMIT) {
            echo Html::a('Tutup Tiket', ['done', 'id_tiket' => $model->id_tiket], ['class' => 'btn btn-danger']);
            echo "\n\n";
        }
        if ($model->status_tiket == Constant::STATUS_DONE) {
            if ($kuisioner) {
                echo Html::a('Lihat Kuisioner', ['kuisioner-result/view', 'id_tiket' => $model->id_tiket], ['class' => 'btn btn-primary']);
            } else {
                echo Html::a('Isi Kuisioner', ['kuisioner-result/create', 'id_tiket' => $model->id_tiket], ['class' => 'btn btn-primary']);
            }

            if ($peringkat != "") { ?>
        <span class="pull-right" style="font-family: 'Source Sans Pro', Arial, Tahoma, Geneva, sans-serif; color: red; font-size: 16px; line-height: 32px;">
            Peringkat Keberhasilan: <?= $peringkat; ?> </span>

        <?php
            }
        }

        if ($model->status_tiket == Constant::STATUS_PROCESS) {
            // echo Html::a('Ajukan Tiket', ['ajukan', 'id_tiket' => $model->id_tiket], ['class' => 'btn btn-warning']);
            $dataApprover = [];
            $approver = User::find()->where(['role' => 2])->all();
            foreach ($approver as $valueDataApprover) {
                $dataApprover[] = 
                [
                    'label' => ucwords($valueDataApprover->username),
                    'url' => ['ajukan', 'id_tiket' => $model->id_tiket, 'approver' => $valueDataApprover->username]
                ];
            }
            echo ButtonDropdown::widget([
                'label' => 'Ajukan Tiket - Pilih Technical Suppport',
                'dropdown' => [
                    'items' => $dataApprover,
                ],
            ]);

        }

        $statusTiket = $model->status_tiket;
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
                // 'content' => function($model, $key, $index, $column) {
                //          echo $this->render('_form_grid', ['model'+>]);
                // },

            ],
            [
                'attribute' => 'notif_man',
                'label' => 'Status',
                'value' => function ($model) {
                    if (!empty($model->notif_man) == Constant::NOTIF_EMAIL && $model->status_sub_tiket != Constant::STATUS_DONE) {
                        return "Proses  Notif Manager : Segera di Selesaikan";
                    } else {
                        return $model->status_sub_tiket;
                    }
                }
            ],


            [
                'attribute' => 'rating',
                'visible' => $statusTiket == Constant::STATUS_DONE ? true : false,
                'value' => function ($model) use ($statusTiket) {
                    if ($statusTiket == Constant::STATUS_DONE) {
                        return
                            StarRating::widget([
                                'name' => 'rating',
                                'value' => $model->rating,
                                'clientOptions' => ['disabled' => false, 'showClear' => false]
                            ]);
                        //          'callback' => '
                        // function(){
                        //     $.ajax({
                        //         type: "POST",
                        //         url: "' . Yii::$app->urlManager->createUrl(['site/index']) . '",
                        //         data: "star_rating=" + $(this).val(),
                        //         success: function(data){
                        //             $("#mystar_voting").html(data);
                        //         }
                        //     })
                        // }'
                        // ]);
                    }
                },

                'format' => 'raw'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) use ($statusTiket) {
                        if ($statusTiket == Constant::STATUS_DONE) {
                            return Html::a(
                                '<span>Input Rating</span>',
                                ['tbl-sub-tiket/rating', 'id' => $model->id_tiket]
                            );
                        }
                    },
                    'rating' => function ($url, $model) use ($statusTiket) {
                        if ($statusTiket == Constant::STATUS_DONE) {
                            $id = $model->id_sub_tiket;
                            return

                                // StarRating::widget([
                                //     'name' => 'rating',
                                //     'value' => $model->rating,
                                //     'clientOptions' => ['disabled' => false, 'showClear' => false,'onClick' => ]
                                // ]);
                                Html::button(
                                    'Beri Rating',
                                    [
                                        'value' => Url::to(['/tbl-sub-tiket/rating', 'id_sub_tiket' => $id]),
                                        'title' => 'Rating', 'class' => 'showModalButton btn btn-warning'
                                    ]
                                );
                        }
                    },
                ],
                'template' => ' {rating} {proses}'

            ],

        ],
    ]); ?>

</div>
<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => true]
]);
echo "<div id='modalContent'></div>";
yii\bootstrap\Modal::end();

$this->registerJS(
    "$(function(){
        $(document).on('click', '.showModalButton', function(){
        if ($('#modal').data('bs.modal').isShown) {
        $('#modal').find('#modalContent')
        .load($(this).attr('value'));
        document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        } else {
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
        document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        }
        });
        });"
)
?>

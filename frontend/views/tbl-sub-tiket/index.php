<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblSubTiketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Sub Tikets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sub-tiket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Sub Tiket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sub_tiket',
            'id_tiket',
            'id_alternatif',
            'id_kriteria',
            'id_sub_kriteria',
            //'status_sub_tiket',
            //'notif_man',
            //'created_date',
            //'rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

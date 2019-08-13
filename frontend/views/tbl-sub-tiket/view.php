<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblSubTiket */

$this->title = $model->id_sub_tiket;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sub Tikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-sub-tiket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_sub_tiket], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sub_tiket], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_sub_tiket',
            'id_tiket',
            'id_alternatif',
            'id_kriteria',
            'id_sub_kriteria',
            'status_sub_tiket',
            'notif_man',
            'created_date',
            'rating',
        ],
    ]) ?>

</div>

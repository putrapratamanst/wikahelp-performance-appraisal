<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblKriteriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Kriteria';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kriteria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kriteria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=> '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kriteria',
            'kd_kriteria',
            'nm_kriteria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

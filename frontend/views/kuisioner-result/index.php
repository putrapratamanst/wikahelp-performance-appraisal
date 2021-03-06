<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KuisionerResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kuisioner Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuisioner-result-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kuisioner Result', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_kuisioner',
            'result',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KuisionerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kuisioner';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuisioner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kuisioner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=>'',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'pertanyaan:ntext',
            [
                'attribute' => 'role',
                'value' => function($model)
                {
                    if ($model->role == 4)
                    {
                        return "User";
                    }
                    if ($model->role == 3)
                    {
                        return "Manager Support";
                    }
                    if ($model->role == 2)
                    {
                        return "Technical Support";
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

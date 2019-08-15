<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSubTiket */

$this->title = 'Update Tbl Sub Tiket: ' . $model->id_sub_tiket;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sub Tikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sub_tiket, 'url' => ['view', 'id' => $model->id_sub_tiket]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-sub-tiket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

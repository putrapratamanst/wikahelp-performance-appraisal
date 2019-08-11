<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblTiket */

$this->title = 'Update Tbl Tiket: ' . $model->id_tiket;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tiket, 'url' => ['view', 'id' => $model->id_tiket]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-tiket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

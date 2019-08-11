<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblTiket */

$this->title = 'Tambah Tiket';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tiket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'kriteria' => $kriteria,
    ]) ?>

</div>

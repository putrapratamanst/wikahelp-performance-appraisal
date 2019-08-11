<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTiket */

$this->title = 'Create Tbl Tiket';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tikets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tiket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

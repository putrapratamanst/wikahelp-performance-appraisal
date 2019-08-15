<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kuisioner */

$this->title = 'Update Kuisioner: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kuisioners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kuisioner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

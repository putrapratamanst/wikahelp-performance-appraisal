<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblUser */

$this->title = 'Update User: ' . $model->id_user;
$this->params['breadcrumbs'][] = ['label' => 'List User', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

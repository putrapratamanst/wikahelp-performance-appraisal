<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSubTiketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sub-tiket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sub_tiket') ?>

    <?= $form->field($model, 'id_tiket') ?>

    <?= $form->field($model, 'id_alternatif') ?>

    <?= $form->field($model, 'id_kriteria') ?>

    <?= $form->field($model, 'id_sub_kriteria') ?>

    <?php // echo $form->field($model, 'status_sub_tiket') ?>

    <?php // echo $form->field($model, 'notif_man') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

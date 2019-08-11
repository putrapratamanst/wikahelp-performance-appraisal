<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSubTiket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sub-tiket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tiket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_alternatif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kriteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_sub_kriteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_sub_tiket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notif_man')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

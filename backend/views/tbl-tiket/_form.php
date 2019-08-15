<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTiket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-tiket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tiket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_alternatif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wkt_tiket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_tiket')->textInput() ?>

    <?= $form->field($model, 'status_tiket')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

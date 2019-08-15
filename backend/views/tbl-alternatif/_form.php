<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblAlternatif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-alternatif-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_alternatif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_alternatif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_alternatif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_alternatif')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

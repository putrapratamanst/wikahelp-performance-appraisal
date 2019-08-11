<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'temla_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tangla_user')->textInput() ?>

    <?= $form->field($model, 'almt_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notelp_user')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

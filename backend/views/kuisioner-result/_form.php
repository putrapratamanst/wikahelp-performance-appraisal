<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KuisionerResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kuisioner-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kuisioner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tiket')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

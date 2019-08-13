<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\multiselect\MultiSelect;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblTiket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-tiket-form" style="padding-top:20px">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tiket')->textInput(['maxlength' => true])  ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

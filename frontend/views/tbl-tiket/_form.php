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

    <!-- $form->field($model, 'id_tiket')->textInput(['maxlength' => true])  -->

    <!-- $form->field($model, 'id_alternatif')->textInput(['maxlength' => true])  -->

    <!-- $form->field($model, 'wkt_tiket')->textInput(['maxlength' => true])  -->

    <!-- $form->field($model, 'tgl_tiket')->textInput()  -->

    <!-- $form->field($model, 'status_tiket')->textInput(['maxlength' => true])  -->


    <?php
    foreach($kriteria as $key => $valueKriteria)
    {
        $subResult = [];
        $subKriteria = $model->getKriteria($valueKriteria['id_kriteria']);
        foreach ($subKriteria as $valueSubkriteria) {
            $subResult[$valueSubkriteria['id_sub_kriteria']] = $valueSubkriteria['nm_sub_kriteria'];
        }
        $a = new ArrayObject($model);
        $b = $a->offsetSet("tempSubKriteria". $key, 2);

        echo $form->field($model, 'tempSubKriteria' . $key)->listBox($subResult,['multiple'=>true])->label($valueKriteria['nm_kriteria']);
    }
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTiketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-tiket-search">


    <?php $form = ActiveForm::begin([
        'action' => ['view-by-user'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1,
            'autocomplete' => 'off'
        ],
    ]); ?>
    <div class="input-group date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="datepicker">
    </div>

    <?= $form->field($model, 'tgl_tiket')->widget(
        DatePicker::className(),
        [
            'options' => ['placeholder' => 'Masukkan Tanggal Tiket'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'

            ]
        ]
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

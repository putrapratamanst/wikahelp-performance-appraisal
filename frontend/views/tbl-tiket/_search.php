<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblTiketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-tiket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1,
            'autocomplete' => 'off'
        ],
    ]); ?>


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
        <?= Html::a('Reset', '/tbl-tiket/index', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

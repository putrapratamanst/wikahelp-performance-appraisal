<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblSubTiket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sub-tiket-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'rating')->widget(\yii2mod\rating\StarRating::class, [
        'options' => [
        // Your additional tag options
        ],
        'clientOptions' => [
        // Your client options
        ],
        ]);?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

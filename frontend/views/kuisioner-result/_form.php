<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KuisionerResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kuisioner-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    foreach ($kuisioner as $key => $valueKuisioner) 
    {        

        $a = new ArrayObject($model);
        $b = $a->offsetSet("tempKuisioner" . $key, NULL);
        
        echo $form->field($model, 'id_kuisioner[]'. $key)->hiddenInput(['value'=> $valueKuisioner['id']])->label(false);
        echo $form->field($model, 'tempKuisioner[]' . $key )->radioList(['1'=>'Ya','0'=>'Tidak'])->label($valueKuisioner['pertanyaan']);

    }

?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

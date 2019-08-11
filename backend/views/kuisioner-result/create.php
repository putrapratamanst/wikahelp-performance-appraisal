<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KuisionerResult */

$this->title = 'Create Kuisioner Result';
$this->params['breadcrumbs'][] = ['label' => 'Kuisioner Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuisioner-result-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

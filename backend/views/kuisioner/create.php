<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kuisioner */

$this->title = 'Create Kuisioner';
$this->params['breadcrumbs'][] = ['label' => 'Kuisioners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kuisioner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

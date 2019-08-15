<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\KuisionerResult */

// $this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kuisioner Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kuisioner-result-view">

    <h1><?= Html::encode($this->title) ?></h1>



</div>

<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>Hasil Kuisioner </h2>
    <p>
        <?= Html::a('Kembali', ['tbl-tiket/view', 'id' => Yii::$app->getRequest()->getQueryParam('id_tiket')], ['class' => 'btn btn-primary']) ?>
    </p>


    <?php
    if (!empty($kuisionerMansup)) {
        ?>
    <center>
        <h4>Manager</h4>
    </center>
    <table>
        <tr>
            <th>Pertanyaan</th>
            <th>Ya</th>
            <th>Tidak</th>
        </tr>
        <?php foreach ($kuisionerMansup as $valueKuisionerMansup) {
                ?>
        <tr>
            <td><?= $valueKuisionerMansup['kuisioner']['pertanyaan']; ?></td>
            <td><?php
                        if ($valueKuisionerMansup['result'] == 1) {
                            echo "<span style='font-size:20px;'>&#10003;</span>";
                        }
                        ?>
            </td>
            <td> <?php if ($valueKuisionerMansup['result'] == 0) {
                                echo "<span style='font-size:20px;'>&#10003;</span>";
                            } ?>
            </td>

        </tr>
        <?php } ?>

    </table>
    <br>
    <?php } ?>

    <?php
    if (!empty($kuisionerTechsup)) {
        ?>

    <center>
        <h4>Technical Support</h4>
    </center>
    <table>
        <tr>
            <th>Pertanyaan</th>
            <th>Ya</th>
            <th>Tidak</th>
        </tr>
        <?php foreach ($kuisionerTechsup as $valueKuisionerTechSup) {
                ?>
        <tr>
            <td><?= $valueKuisionerTechSup['kuisioner']['pertanyaan']; ?></td>
            <td><?php
                        if ($valueKuisionerTechSup['result'] == 1) {
                            echo "<span style='font-size:20px;'>&#10003;</span>";
                        }
                        ?>
            </td>
            <td> <?php if ($valueKuisionerTechSup['result'] == 0) {
                                echo "<span style='font-size:20px;'>&#10003;</span>";
                            } ?>
            </td>

        </tr>
        <?php } ?>

    </table>
    <br>
    <?php } ?>
    <?php if (!empty($kuisioner)) { ?>
    <center>
        <h4>User</h4>
    </center>

    <table>
        <tr>
            <th>Pertanyaan</th>
            <th>Ya</th>
            <th>Tidak</th>
        </tr>
        <?php foreach ($kuisioner as $valueKuisioner) {
                ?>
        <tr>
            <td><?= $valueKuisioner['kuisioner']['pertanyaan']; ?></td>
            <td><?php
                        if ($valueKuisioner['result'] == 1) {
                            echo "<span style='font-size:20px;'>&#10003;</span>";
                        }
                        ?>
            </td>
            <td> <?php if ($valueKuisioner['result'] == 0) {
                                echo "<span style='font-size:20px;'>&#10003;</span>";
                            } ?>
            </td>

        </tr>
        <?php }
        } ?>

    </table>



</body>

</html>

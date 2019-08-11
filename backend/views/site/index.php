<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang <?= Yii::$app->user->identity->username ?>!</h1>

        <p class="lead">Ini adalah halaman kelola <?= Yii::$app->user->identity->username ?>.</p>

    </div>
 <?php if (Yii::$app->user->identity->username =="admin"){ ?>
    <div class="body-content">
        <div class="row test ">
            <div class="col-sm-4">
                <center><a class="btn btn-default" href="/kuisioner/index">Kelola Kuisioner </a></center>
            </div>
            <div class="col-sm-4">
                <center><a class="btn btn-default" href="/tbl-alternatif/index">Kelola Alternatif </a></center>
            </div>
            <div class="col-sm-4">
                <center><a class="btn btn-default" href="/tbl-user/index">Kelola Admin </a></center>
            </div>
        </div>
        <div class="row test ">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <center> <a class="btn btn-default" href="/tbl-kriteria/index">Kelola Kriteria </a></center>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
 <?php } ?>
 <?php if (Yii::$app->user->identity->username =="mansup"){ ?>
    <div class="body-content">
        <div class="row test ">
            <div class="col-sm-4">
                <center><a class="btn btn-default" href="/tbl-tiket/index">Kelola Tiket </a></center>
            </div>
            <div class="col-sm-4">
                <center><a class="btn btn-default" href="/tbl-alternatif/index">Kelola Alternatif </a></center>
            </div>
            <div class="col-sm-4">
                <center><a class="btn btn-default" href="/tbl-user/index">Kelola Admin </a></center>
            </div>
        </div>
        <div class="row test ">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <center> <a class="btn btn-default" href="/tbl-kriteria/index">Kelola Kriteria </a></center>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
 <?php } ?>
 <?php if (Yii::$app->user->identity->username =="techsup"){ ?>
    <div class="body-content">
        <div class="row test ">
            <div class="col-sm-6">
                <center><a class="btn btn-default" href="/tbl-tiket/index">Kelola Tiket </a></center>
            </div>
            <div class="col-sm-6">
                <center><a class="btn btn-default" href="/tbl-alternatif/index">Kelola Alternatif </a></center>
            </div>
        </div>
        <div class="row test ">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <center> <a class="btn btn-default" href="/tbl-kriteria/index">Kelola Kriteria </a></center>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
 <?php } ?>
</div>

<style>
    .test [class*="col-"] {
        padding: 15px;
        background-color: #f1f1f1;
        border: 1px solid #D8D8D8;
    }
</style>

<?php

use app\assets\AppAsset;

AppAsset::register($this);
//AppAsset::addJs($this,Yii::$app->request->baseUrl."/js/a.js");
//AppAsset::addCss($this,Yii::$app->request->baseUrl."/css/b.css");

$this->registerCsrfMetaTags(); //ajax安全策略



$this->beginPage();
?>

<!DOCTYPE html>
<html lang="en">

<?php $this->head() ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>骂骂酱管理后台</title>
    <meta name="description" content="骂骂酱管理后台">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <!--    <link rel="icon" type="image/png" href="assets/i/favicon.png">
        <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
        <meta name="apple-mobile-web-app-title" content="Amaze UI" />
        <script src="assets/js/echarts.min.js"></script>
        <link rel="stylesheet" href="assets/css/amazeui.min.css" />
        <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
        <link rel="stylesheet" href="assets/css/app.css">
        <script src="assets/js/jquery.min.js"></script>-->
</head>

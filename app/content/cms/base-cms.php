<!doctype html>
<html lang="pt">
<head>
    <title><?= TITLE ?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="<?= AUTHOR ?>">
    <meta name="description" content="<?= DESCRIPTION ?>">

    <!-- CSS -->
    <link rel="stylesheet" href="../<?= COMPONENTS . 'bootstrap/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="../<?= COMPONENTS . 'font-awesome/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="../<?= CSS . 'cms.css' ?>">

    <!-- JS -->
    <script src="../<?= COMPONENTS . 'jquery/jquery.min.js' ?>"></script>
    <script src="../<?= COMPONENTS . 'bootstrap/js/bootstrap.min.js' ?>"></script>

    <!-- Favicon -->
    <link rel="icon" href="<?= IMG . 'favicon.png' ?>">

</head>
<body>

<?php
require_once $this->content;
?>

</body>
</html>
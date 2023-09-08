<?php 
$Db->setParams([
    'table' => 'config'
]);
$config = $Db->result();
$config = $config[0];
//var_dump($config);
?>
<!doctype html>
<html lang="pt">
<head>
    <title><?= $config->titlesite ?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="<?= AUTHOR ?>">

    <!-- CSS -->
    <link rel="stylesheet" href="../<?= COMPONENTS . 'bootstrap/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="../<?= COMPONENTS . 'font-awesome/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="../<?= CSS . 'cms.css' ?>">

    <!-- JS -->
    <script src="../<?= COMPONENTS . 'jquery/jquery.min.js' ?>"></script>
    <script src="../<?= COMPONENTS . 'bootstrap/js/bootstrap.min.js' ?>"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../<?= IMG . 'favicon.png' ?>" />

</head>
<body>

<?php
require_once $this->content;
?>

</body>
</html>
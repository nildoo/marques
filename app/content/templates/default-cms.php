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
    <link rel="stylesheet" href="../<?= COMPONENTS . 'dataTable/dataTables.bootstrap.min.css' ?>">
    <link rel="stylesheet" href="../<?= CSS . 'cms.css' ?>">
    <link rel="stylesheet" href="../<?= CSS . 'sweetalert.css' ?>">

    <!-- JS -->
    <script src="../<?= COMPONENTS . 'jquery/jquery.min.js' ?>"></script>
    <script src="../<?= COMPONENTS . 'bootstrap/js/bootstrap.min.js' ?>"></script>
    <script src="../<?= COMPONENTS . 'ckeditor/ckeditor.js' ?>"></script>
    <script src="../<?= COMPONENTS . 'jquery/jquery-1.10.2.js' ?>"></script>
    <script src="../<?= COMPONENTS . 'jquery/jquery-ui.js' ?>"></script>
    <script src="../<?= COMPONENTS . 'ckeditor/config.js' ?>"></script>
    <script src="../<?= COMPONENTS . 'ckeditor/styles.js' ?>"></script>
    <script src="../<?= JS_CMS . 'cms.js' ?>"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../<?= IMG . 'favicon.png' ?>" />

</head>
<body>

<?php

$Db->setParams([
    'table' => 'user',
    'condition' => [
        'id' => $_SESSION['usuario'][0]->id
    ]
]);

$r = $Db->result();
$user = $r[0];

?>

<div id="wrapper" class="toggled">
    <div id="sidebar-wrapper">
        <div class="sidebar-brand text-center">
            <img src="../<?= IMG . 'netmidia.png' ?>">
        </div>
        <ul class="sidebar-nav">

            <?php

            foreach (MENU_CMS as $link => $menu) {

                if ($link == $this->url) {
                    $pagina_ativa = true;
                } else {
                    $pagina_ativa = false;
                }

                foreach (ICON_MENU as $key => $value) {
                    if ($key == $link) {
                        $icon = $value;
                    }
                }

                ?>

                <li id="menu-<?= $link ?>" <?= ($pagina_ativa ? "class='active'" : "") ?>>
                    <a href="<?= $link ?>">
                        <i class="fa <?= $icon ?>"></i> <?= $menu ?>
                    </a>
                </li>
            <?php } ?>
                <li id="menu-usuarios" <?= ($this->url == "usuarios" ? "class='active'" : "") ?>>
                    <a href="usuarios">
                        <i class="fa fa-users"></i> Usuários
                    </a>
                </li>
        </ul>
    </div>

    <div id="page-content-wrapper">

        <div class="navbar navbar-default">
            <div class="navbar-brand">
                <a data-target="#menu-toggle" class="btn btn-blue" id="menu-toggle">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li id="menu-admin">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="">
                        <?= $user->name ?> <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li id="menu-perfil"><a href="detalhes-perfil-<?= $user->id?>"><i class="fa fa-user"></i> Perfil</a>
                        </li>
                        <li><a id="logout" href=""><i class="fa fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <br>

        <div class="container-fluid">
            <div class="row">
                <div class="panel-content">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="col-xs-12">
                                <?php require_once $this->content; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>

<script src="../<?= COMPONENTS . 'dataTable/jquery.dataTables.min.js' ?>"></script>
<script>
    if ($(".table").hasClass('table-modalidade')) {

        $(".table-imovel").dataTable({
            "order": [[0, 'desc']]
        });

    } else {
        $(".table").dataTable();
    }
</script>

</body>
<script src="../<?= COMPONENTS . 'jquery/jquery.mask.min.js' ?>"></script>
<script src="../<?= COMPONENTS . 'jquery/jquery.maskMoney.min.js' ?>"></script>
<script src="../<?= COMPONENTS . 'jquery/sweetalert.min.js' ?>"></script>
</html>
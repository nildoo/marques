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

    <meta name="keyword" content="<?= $config->metakeyword ?>">
    <meta name="description" content="<?= $config->metadescription ?>">
    <meta name="author" content="<?= AUTHOR ?>">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= COMPONENTS . 'swiper/css/swiper.min.css' ?>">
    <link rel="stylesheet" href="<?= COMPONENTS . 'bootstrap/css/bootstrap.min.css' ?>" hide>
    <link rel="stylesheet" href="<?= COMPONENTS . 'font-awesome/css/all.css' ?>">
    <link rel="stylesheet" href="<?= COMPONENTS . 'owl-carousel/css/owl.carousel.min.css' ?>">
    <link rel="stylesheet" href="<?= COMPONENTS . 'owl-carousel/css/owl.theme.min.css' ?>">
    <link rel="stylesheet" href="<?= CSS . 'site.css' ?>">
    <link rel="stylesheet" href="<?= CSS . 'hero.css' ?>">
    <link rel="stylesheet" href="<?= CSS . 'accordion.css' ?>">

    <!-- JS -->
    <script src="<?= COMPONENTS . 'jquery/jquery.min.js' ?>"></script>
    <script src="<?= COMPONENTS . 'jquery/jquery.easing.min.js' ?>"></script>
    <script src="<?= COMPONENTS . 'bootstrap/js/bootstrap.min.js' ?>"></script>

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= IMG . 'favicon.png' ?>" />

</head>

<body>
    <header>
        <nav class="navbar navbar-default " role="navigation">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand page-scroll" data-target="home" href="initial">
                            <img src="<?= IMG . "marques-montagens.png" ?>" alt="<?= $config->titlesite ?>">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="nav navbar-right navbar-nav">
                            <?php foreach (MENU_SITE as $label => $link) { ?>
                                <li <?= ($label == $this->url ? "class='active'" : "") ?>>
                                    <a href="<?= $label ?>"><?= $link ?></a>
                                </li>

                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="content">
        <?php require_once $this->content; ?>
    </div>

    <a href='#' class="scrollup_fade"><i class="fa fa-arrow-up"></i></a>

    <footer class="bg-grayDark">
        <div class="pd-50">
            <div class="container">
                <div class="logo-white">
                    <img src="<?= IMG . 'logo_rodape.png' ?>" alt="<?= $config->titlesite ?>">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="menu-footer">
                            <ul>
                                <?php foreach (MENU_SITE as $label => $link) { ?>
                                    <li <?= ($label == $this->url ? "class='active'" : "") ?>>
                                        <a href="<?= $label ?>"><?= $link ?></a>
                                    </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="address">
                            <ul>
                                <li>Endereço:</li>
                                <li>Rua Leodegário Pedro da Silva, 565</li>
                                <li>Imaruí, <strong>Itajaí</strong> | SC | 88305 600</li>
                                <li>&nbsp;</li>
                                <li><strong>55 47 3349-5662</strong></li>
                                <li>contato@marquesmontagens.com.br</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="socialMdedia">
                            <h2>Siga-nos <span> nas Redes</span></h2>
                            <ul>
                                <li>
                                    <a href="">
                                        <span class="fa-stack fa-lg">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="fa-stack fa-lg">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <h3>@marquesmontagens</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="pull-left">
                    <p>&copy 2023 <strong><?= $config->titlesite ?></strong> Todos os direitos reservados</p>
                </div>
                <div class="pull-right">
                    <p>Produzido por: <a href="http://www.agencianetmidia.com.br" target="_blank">Agência Netmidia</a>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </footer>
    <script src="<?= JS . 'site.js' ?>"></script>
    <script src="<?= COMPONENTS . 'jquery/jquery.mask.min.js' ?>"></script>
    <script>
        $(document).ready(function() {
            $('#telefone').mask('(00) 0000-00009');
        });
    </script>
</body>

</html>
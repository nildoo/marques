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
    <link rel="stylesheet" href="<?= COMPONENTS . 'bootstrap/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= COMPONENTS . 'lightbox/css/lsb.css' ?>">
    <link rel="stylesheet" href="<?= COMPONENTS . 'font-awesome/css/all.css' ?>">
    <link rel="stylesheet" href="<?= COMPONENTS . 'owl-carousel/css/owl.carousel.min.css' ?>">
    <link rel="stylesheet" href="<?= COMPONENTS . 'owl-carousel/css/owl.theme.min.css' ?>">
    <link rel="stylesheet" href="<?= CSS . 'site.css' ?>">
    <link rel="stylesheet" href="<?= CSS . 'hero.css' ?>">

    <!-- JS -->
    <script src="<?= COMPONENTS . 'jquery/jquery-2.2.4.min.js' ?>"></script>
    <script src="<?= COMPONENTS . 'jquery/jquery.easing.min.js' ?>"></script>
    <script src="<?= COMPONENTS . 'bootstrap/js/bootstrap.min.js' ?>"></script>
    <script src="<?= COMPONENTS . 'lightbox/js/lsb.js' ?>"></script>
    <script>
        $(window).load(function() {
            $.fn.lightspeedBox({
                showDownloadButton: false,
                showAutoPlayButton: false,
                showImageCount: false,
                autoPlayback: false,
                locale:{
                    nextButton: 'Próxima',
                    prevButton: 'Anterior',
                    closeButton: 'Fechar',
                    downloadButton: 'Download imagem',
                    noImageFound: 'Sem imagem',
                    downloadButton: 'Download imagem',
                    autoplayButton: 'Autoplay'
                }
            });
        });
    </script>

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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="gridSystemModalLabel">Que tipo de Cookies Utilizamos?</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Cookies necessários</td>
                                        <td>
                                            Sempre Ativos
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cookies analitícos</td>
                                        <td>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cookies de publicidade</td>
                                        <td>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <ul>
                                <li>
                                    <a class="btn btn-cookie" data-dismiss="modal" aria-label="Close" id="cookie-notification-close" href="#">Aceitar Todos</a>
                                </li>
                                <li>
                                    <button class="btn btn-cookie-orange" data-dismiss="modal" aria-label="Close">Rejeitar não necessários</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="cookie-notification" class="CookieMessage" style="display: none;">
        <div class="CookieMessage-content">
            <div class="policy-title">
                <h2>Política de Cookies</h2>
            </div>
            <div class="Cookie-flex">
                <div class="Cookie-description">
                    Eu concordo e dou consentimento à Marques Montagens o tratamento dos meus dados pessoais para as finalidades descritas
                    na Política de Privacidade. Eu li, compreendi e concordo com a Política de Privacidade e Termos de Uso deste site.
                    Veja em <strong>Política de Privacidade</strong> e <strong>Termos de Uso.</strong>
                </div>
                <div class="Cookie-aception">
                    <ul>
                        <li><a id="cookie-notification-close-bottom" href="#">Aceitar</a></li>
                        <li data-toggle="modal" data-target="#myModal">Gerenciar Cookies</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <script>
        if (!localStorage.getItem("cookiesAccepted")) {
            var cookieMessage = document.getElementById('cookie-notification');
            var closeCookie = document.getElementById('cookie-notification-close');
            var closeCookieBottom = document.getElementById('cookie-notification-close-bottom');

            cookieMessage.style.display = 'block';
            closeCookie.addEventListener("click", function(e) {
                e.preventDefault();
                localStorage.setItem("cookiesAccepted", true);

                cookieMessage.style.display = 'none';
            });

            cookieMessage.style.display = 'block';
            closeCookieBottom.addEventListener("click", function(e) {
                e.preventDefault();
                localStorage.setItem("cookiesAccepted", true);

                cookieMessage.style.display = 'none';
            });
        }
    </script>
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
                                <li>
                                    <a href="work-us">Trabalhe Conosco</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="address">
                            <ul>
                                <li>Endereço:</li>
                                <li><?= $config->address ?></li>
                                <li><?= $config->district ?>, <strong><?= $config->city ?></strong> | <?= $config->state ?> | <?= $config->zipcode ?></li>
                                <li>&nbsp;</li>
                                <li><strong>55 47 3349-5662</strong></li>
                                <li><?= $config->email ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="socialMdedia">
                            <h2>Siga-nos <span> nas Redes</span></h2>
                            <ul>
                                <li>
                                    <a href="<?= $config->instagram ?>" target="_blank">
                                        <span class="fa-stack fa-lg">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://api.whatsapp.com/send?phone=55<?= $config->whatsapp ?>&#038;text=O que posso estar ajudando você?" target="_blank">
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
        <div class="Privacy-Policy text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><span>LGPD</span></li>
                            <li><i class="fas fa-shield-alt"></i> <a href="<?= IMG . 'compliance/politica-de-privacidade.pdf' ?>" target="_blank"> Política de Privacidade</a></li>
                            <li><i class="far fa-file-alt"></i> <a href="<?= IMG . 'compliance/termos-de-uso.pdf' ?>" target="_blank"> Termos de Uso</a></li>
                        </ul>
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
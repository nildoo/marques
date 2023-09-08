<?php
$Db->setParams([
    'table' => 'config'
]);
$r = $Db->result();
$config = $r[0];

$Db->setParams([
    'table' => 'about'
]);
$r = $Db->result();
$conteudo = $r[0];

$Db->setParams([
    'table' => 'blog',
    'condition' => [
        'active' => 1
    ],
    'order' => 'id DESC',
    'limit' => '3'
]);
$blog = $Db->result();

$Db->setParams([
    'table' => 'banner',
    'condition' => [
        'active' => 1
    ],
    'order' => 'id DESC'
]);
$r = $Db->result();
//var_dump($r);
?>
<?php
$texto =  (explode(" ", $r[0]->title, 2));
?>
<section class="hero-slider hero-style">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php for ($i = 0; $i < count($r); $i++) { ?>
                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="<?= IMG . 'banner/' . $r[$i]->img ?>" alt="<?= $r[0]->title ?>">
                        <div class="container">
                            <div style="margin-top: 60px;">
                                <div data-swiper-parallax="300" class="slide-title">
                                    <h2><?= $r[$i]->title ?></h2>
                                </div>
                                <div data-swiper-parallax="400" class="slide-text">
                                    <p><?= $r[$i]->content ?></p>
                                </div>
                                <div class="clearfix"></div>
                                <?php if ($r[$i]->button) { ?>
                                    <div data-swiper-parallax="500" class="slide-btns">
                                        <a href="<?= $r[$i]->link ?>" class="theme-btn-s2"><?= $r[$i]->button ?></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- <div class="swiper-pagination"></div> -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <script src="<?= COMPONENTS . 'swiper/js/swiper_4.5.1_js_swiper.min.js' ?>"></script>
    <script>
        // HERO SLIDER
        var menu = [];
        jQuery('.swiper-slide').each(function(index) {
            menu.push(jQuery(this).find('.slide-inner').attr("data-text"));
        });
        var interleaveOffset = 0.5;
        var swiperOptions = {
            loop: true,
            speed: 1000,
            parallax: true,
            autoplay: {
                delay: 6500,
                disableOnInteraction: false,
            },
            watchSlidesProgress: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            on: {
                progress: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        var slideProgress = swiper.slides[i].progress;
                        var innerOffset = swiper.width * interleaveOffset;
                        var innerTranslate = slideProgress * innerOffset;
                        swiper.slides[i].querySelector(".slide-inner").style.transform =
                            "translate3d(" + innerTranslate + "px, 0, 0)";
                    }
                },

                touchStart: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = "";
                    }
                },

                setTransition: function(speed) {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".slide-inner").style.transition =
                            speed + "ms";
                    }
                }
            }
        };

        var swiper = new Swiper(".swiper-container", swiperOptions);

        // DATA BACKGROUND IMAGE
        var sliderBgSetting = $(".slide-bg-image");
        sliderBgSetting.each(function(indx) {
            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });
    </script>
</section>

<section class="intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-home">
                    <h1>Bem-vindo à Marques Montagens <span>Sua excelência em soluções metalúrgicas!</span> </h1>
                </div>
            </div>
            <div class="col-sm-12">
                <?= $config->well ?>
                <!-- <p>Somos uma equipe apaixonada por inovação e excelência. Com profissionais altamente treinados
                    e uma história de sucesso no mercado metalúrgico, oferecemos as melhores soluções para a sua empresa.
                </p> -->
            </div>
        </div>
    </div>

</section>

<section class="service-In bg-blue pd-100 text-center">
    <div class="title">
        <h1>Nossos Serviços</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="servico">
                <ul class="items">
                    <li>Corte Plasma, Guilhotina e Dobradeira</li>
                    <li>Prensagem e Calandragem</li>
                    <li>Fornecimento de chapas e perfis <span>em aço inoxídavel e carbono</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="pd-80 qualy text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="description">
                    <?= $config->service?>
                    <!-- Atendemos diversos setores, desde <strong>indústria química, papel celulose e alimentícia até o segumento naval, hidroelétrico.</strong>
                    <span>Conte a Marques Montagens para entregar resultados de alta qualidade e surpreender seus clientes!</span> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="center-contact">
    <div class="side-left">
        <div class="content">
        <h1><?= $config->contact?></h1>
            <!-- <h1>Entre em contato e descubra como <span>nossas soluções podem levar seu negócio a novos patamares.</span></h1> -->
            <div class="areaBotton">
                <a href="contact-us"><button class="btn btn-trans">Fale Agora Conosco</button></a>
            </div>
        </div>
    </div>
    <div class="side-right"></div>
</section>

<section class="client pd-80 bg-gray">
    <div class="title">
        <h1>Nossos Principais Clientes</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><i class="fab fa-apple"></i></li>
                    <li><i class="fab fa-apple"></i></li>
                    <li><i class="fab fa-apple"></i></li>
                    <li><i class="fab fa-apple"></i></li>
                    <li><i class="fab fa-apple"></i></li>
                    <li><i class="fab fa-apple"></i></li>
                    <li><i class="fab fa-apple"></i></li>
                </ul>
            </div>
            <div class="col-sm-12">
                <div class="description">
                    Com mais de 30 anos de experiencia, a Marques Montagens contruiu uma reputação sólida no mercado metalurgico
                    atendendo todo o território nacional e América do Sul. Nossa história é pautada em entregas pontuais, quantidade
                    exepcional e satisfação garantida. Sua confiança é a nossa maior conquista!
                </div>
            </div>
            <div class="col-sm-12">
                <div class="item">
                    <h1>Qualidade Sólida e<span>experiência comprovada</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pd-80 bg-blue">
    <div class="minContact">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="minBoxLeft">
                        <h1>Contato</h1>
                        <div class="content">
                            Conte com a Marques Montagens para impulsionar o crescimento e o sucesso do seu negócio.
                            <span> Entre em contato conosco hoje e descubra como podemos transformar sua visão em realidade,
                                com soluções metalúrgicas que fazem a diferença!</span>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>Atendemos também <span>pelo <b>Whatsapp</b></span></h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="initai-talk">
                                    <a href=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="minBoxRight">
                        <div class="row">
                            <form id='#form-contact'>
                                <div class="col-sm-12">
                                    <input class="form-control" name="nome" id="nome" placeholder="Nome*" required />
                                </div>
                                <div class="col-sm-12">
                                    <input class="form-control" name="empresa" id="empresa" placeholder="Empresa*" required />
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" name="telefone" id="telefone" placeholder="(DDD)+Telefone" required />
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required />
                                </div>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="projeto" id="projeto" cols="30" rows="3" placeholder="Qual o seu projeto?" required ></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <div class="pull-right">
                                        <button class="btn btn-green" type="submit">ENVIAR</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
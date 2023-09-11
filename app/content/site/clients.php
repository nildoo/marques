<section class="navegation-page" style="padding: 234px 0; background: url('<?= IMG . 'top-clients.jpg' ?>') center center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Conheça alguns <span>de nossos Clientes</span></h2>
            </div>
        </div>
    </div>
</section>

<section class="client pd-80 bg-gray">
    <div class="title">
        <h1>Nossos Principais Clientes</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="">
                    <?php
                    $Db->setParams([
                        'table' => 'client',
                        'order' => 'name ASC'
                    ]);
                    $clients = $Db->result();
                    foreach ($clients as $client) { ?>
                        <li>
                            <img src="<?= IMG . 'service/' . $client->img ?>" alt="<?= $client->name ?>" />
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-sm-12">
                <div class="item">
                    <h1>Qualidade Sólida e<span>experiência comprovada</span></h1>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="description">
                    Com mais de 30 anos de experiencia, a Marques Montagens contruiu uma reputação sólida no mercado metalurgico
                    atendendo todo o território nacional e América do Sul. Nossa história é pautada em entregas pontuais, quantidade
                    exepcional e satisfação garantida. Sua confiança é a nossa maior conquista!
                </div>
            </div>
        </div>
    </div>
</section>

<section class="center-contact">
    <div class="side-left">
        <div class="content">
            <h2>Confira algns de nossos projetos</h2>
            <div class="areaBotton">
                <a href="services"><button class="btn btn-trans">Ver projetos</button></a>
            </div>
        </div>
    </div>
    <div class="side-rightClient"></div>
</section>

<section class="pd-80 bg-blue">
    <div class="newContact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titleForm">
                        <h1>Faça parte dessa história de sucesso!</h1>
                        <h2>Entre em contato conosco e descubra como a Marques <span> Montagens
                                pode impulsionar o crescimento do seu negócio!</span>
                        </h2>
                    </div>
                </div>
                <div class="pd-line-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <form id='form-contact'>
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
                        </div>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="projeto" id="projeto" cols="30" rows="5" placeholder="Qual o seu projeto?" required></textarea>
                            <div class="col-sm-12">
                                <div class="pull-right">
                                    <br />
                                    <button class="btn btn-green" type="submit">ENVIAR</button>
                                </div>
                            </div>
                            </form>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-sm-12">
                            <div class="">
                                <ul class="whatsapp">
                                    <li>
                                        <h1>Atendemos também pelo <span>Whatsapp</span></h1>
                                    </li>
                                    <li><img src="<?= IMG . 'botao_iniciar_conversa2.png' ?>" alt=""></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
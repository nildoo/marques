<section class="navegation-page" style="padding: 267px 0; background: url('<?= IMG . 'top-about.jpg' ?>') center center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Bem-Vindo à Marques Montagens</h1>
            </div>
        </div>
    </div>
</section>

<section class="pd-100 about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="area-about">
                    <div class="title-about">
                        <h1>Sua excêlencia em <span>Soluções Metalúrgicas!</span></h1>
                        <p>Com uma equipe altamente capacitada, a Marques Montagens é referência no mercado
                            metalúrgico. Nossa tragetória é marcada pela dedicação, inovação e comprometimento com
                            nossos clientes.
                        </p>
                    </div>
                    <div class="aboutValue">
                        <h1>Nossos Valores</h1>
                        <p>1. <strong>Excêlencia:</strong> Buscamos sempre aprimorar nossas soluções,
                            garantindo a máxima qualidade em cada projeto
                        </p>
                        <p>2. <strong>Integridade:</strong> Agimos com honestidade e transparência em todas
                            as nossas relações, construindo parcerias solidas e duradouras.
                        </p>
                        <p>3. <strong>Inovação:</strong> Estamos na vanguarda tecnológica, utilizando equimentos
                            de última geração para oferecer o que há de melhor em soluções metalúrgicas.
                        </p>
                        <p>4. <strong>Responsabilidade Socioambiental:</strong> Prezamos pelo respeito ao meio
                            ambiente e à comunidade onde atuamos, buscando práticas sustentáveis em nossas operações.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="picture">
                    <img src="<?= IMG . 'foto_funcionario.png' ?>" alt="">
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-sm-6">
                <div class="mission">
                    <h1>Nossa Missão:</h1>
                    <p>Entregar os resultados excepcionais, superando as expectativas dos nossos clientes,
                        por meio de soluções metalúrgicas inovadoras e eficientes.
                    </p>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="vision">
                    <h1>Nossa Visão:</h1>
                    <p>Ser reconhecida como líder no mercado metalúrgico, sendo a primeira escolha de nossos
                        parceiros e clientes.
                    </p>
                </div>
            </div>
        </div>
    </div>
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
                                    <li>
                                        <a href="https://api.whatsapp.com/send?phone=55<?= $config->whatsapp ?>&#038;text=O que posso estar ajudando você?" target="_blank">
                                            <img src="<?= IMG . 'botao_iniciar_conversa2.png' ?>" alt="">
                                        </a>    
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
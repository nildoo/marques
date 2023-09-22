<section class="navegation-page" style="padding: 234px 0; background: url('<?= IMG . 'top-contact.jpg' ?>') center center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Vamos <span>Conversar?</span></h2>
            </div>
        </div>
    </div>
</section>

<section class="pd-100 bg-gray contact-new">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Entre em contato e descubra como podemos contribuir para o sucesso do seu negócio.</h1>
            </div>
            <div class="col-md-6">
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
                    <div class="col-sm-12">
                        <textarea class="form-control" name="projeto" id="projeto" cols="30" rows="3" placeholder="Qual o seu projeto?" required></textarea>
                    </div>
                    <div class="col-sm-12">
                        <div class="pull-right">
                            <button class="btn btn-green" type="submit">ENVIAR</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="clearfix"></div>

            <br>
            <br>
            <br>

            <div class="col-sm-6">
                <div class="content-desc">
                    <p>
                        <?= $config->address ?><br /><?= $config->district . ', <strong>' . $config->city . '</strong> | ' . $config->state . ' | ' . $config->zipcode ?>
                    </p>
                    <p>
                        <div class="phone">
                            <?= $config->phone ?>
                        </div>
                       <div>
                           contato@marquesmontagens.com.br
                       </div>
                    </p>
                    <div class="wpp">
                        <h2>Atendemos também <span>pelo <strong>WhatsApp</strong></span></h2>
                        <p>
                            <a href="https://api.whatsapp.com/send?phone=55<?= $config->whatsapp ?>&#038;text=O que posso estar ajudando você?" target="_blank">
                                <img src="<?= IMG . 'botao_iniciar_conversa 2.png'?>" alt="">
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <iframe src=" <?=$config->maps ?>" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
            </div>

        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#telefone').mask('(00) 00000-0009')
    });
</script>
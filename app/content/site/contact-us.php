<section class="navegation-page" style="padding: 234px 0; background: url('<?= IMG . 'top-contact.jpg' ?>') center center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Vamos <span>Conversar?</span></h2>
            </div>
        </div>
    </div>
</section>

<section class="pd-100 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-6 contact-us">
                <form class="form-group" role="form" id="form-contato">
                    <div class="col-md-12">
                        <h2>Entre em contato.</h2>
                    </div>
                    <div class="col-sm-6">
                        <label for="nome">Nome</label>
                        <input class="form-control" id="nome" type="text" placeholder="Nome" name="nome" required />
                    </div>
                    <div class="col-sm-6">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" placeholder="Email" name="email" required />
                    </div>
                    <div class="col-sm-6">
                        <label for="telefone">Telefone</label>
                        <input class="form-control" id="telefone" type="text" placeholder="Telefone" name="telefone" required />
                    </div>
                    <div class="col-sm-6">
                        <label for="assunto">Telefone</label>
                        <input class="form-control" name="assunto" id="assunto" type="text" placeholder="Assunto" />
                    </div>
                    <div class="col-sm-12">
                        <label for="mensagem">Mensagem</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" placeholder="Mensagem" id="mensagem" rows="5" required></textarea>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-darkBlue" type="submit">Enviar</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
            <div class="col-md-6 location-us">
                <div class="box-location">
                    <div class="content-icon">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="box-right">
                        <div class="content-title">ESCRITÓRIO</div>
                        <div class="content-desc"><?= $config->address ?><br /><?= $config->district . ', ' . $config->city . ', ' . $config->state ?></div>
                    </div>
                </div>
                <div class="box-location">
                    <div class="content-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="box-right">
                        <div class="content-title">TELEFONE</div>
                        <div class="content-desc"><?= $config->whatsapp ?> <br><?= $config->phone ?></div>
                    </div>
                </div>
                <div class="box-location">
                    <div class="content-icon">
                        <i class="fa fa-envelope-open"></i>
                    </div>
                    <div class="box-right">
                        <div class="content-title">NOSSO EMAIL</div>
                        <div class="content-desc">contato@marquesmontagens.com.br <br />site@marquesmontagens.com.br</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= COMPONENTS . 'jquery/jquery.mask.min.js' ?>"></script>
<script>
    $(document).ready(function() {
        $('#telefone').mask('(00) 00000-0009')
    });
</script>
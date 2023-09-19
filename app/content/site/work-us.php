<section class="navegation-page" style="padding: 234px 0; background: url('<?= IMG . 'top-contact.jpg' ?>') center center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Junte-se à  <span>Nossa Equipe</span></h2>
            </div>
        </div>
    </div>
</section>

<section class="pd-100 bg-gray contact-new">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Faça parte da nossa equipe e venha trabalhar conosco.</h1>
            </div>
            <div class="col-md-6">
                <form id='#form-contact'>
                    <div class="col-sm-12">
                        <input class="form-control" name="nome" id="nome" placeholder="Nome*" required />
                    </div>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail*" required />
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control" name="telefone" id="telefone" placeholder="(DDD)+Telefone*" required />
                    </div>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="img" id="img" required />
                    </div>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="projeto" id="projeto" cols="30" rows="3" placeholder="Comente aqui" required></textarea>
                    </div>
                    <div class="col-sm-12">
                        <div class="pull-right">
                            <button class="btn btn-green" type="submit">ENVIAR</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</section>

<script src="<?= COMPONENTS . 'jquery/jquery.mask.min.js' ?>"></script>
<script>
    $(document).ready(function() {
        $('#telefone').mask('(00) 00000-0009')
    });
</script>
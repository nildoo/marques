<?php
$Db->setParams([
    'table' => 'config',
]);
$r = $Db->result();
?>
<form id="u-form-config">

    <div class="row">

        <div class="col-sm-6">
            <label for="titlesite"><i class="fa fa-briefcase"></i> Titulo Site</label>
            <input class="form-control" id="titlesite" name="titlesite" placeholder="Titulo Site" value="<?= $r[0]->titlesite ?>" required />
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-3">
            <label for="address"> Endereço</label>
            <input class="form-control" id="address" name="address" placeholder="Endereço" value="<?= $r[0]->address ?>" required />
        </div>
        <div class="col-sm-3">
            <label for="district"> Bairro</label>
            <input class="form-control" id="district" name="district" placeholder="Bairro" value="<?= $r[0]->district ?>" required />
        </div>

        <div class="col-sm-3">
            <label for="city"> Cidade</label>
            <input class="form-control" id="city" name="city" placeholder="Cidade" value="<?= $r[0]->city ?>" required />
        </div>
        <div class="col-sm-1">
            <label for="state"> Estado</label>
            <input class="form-control" id="state" name="state" placeholder="Estado" value="<?= $r[0]->state ?>" required />
        </div>
        <div class="col-sm-2">
            <label for="zipcode"> CEP</label>
            <input class="form-control" id="zipcode" name="zipcode" placeholder="CEP" value="<?= $r[0]->zipcode ?>" required />
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-6">
            <label for="obs"> OBS Endereço</label>
            <input class="form-control" id="obs" name="obs" placeholder="obs" value="<?= $r[0]->obs ?>" />
        </div>

        <div class="col-sm-6">
            <label for="pobox"> Caixa Postal</label>
            <input class="form-control" id="pobox" name="pobox" placeholder="Caixa Postal" value="<?= $r[0]->pobox ?>" />
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-6">
            <label for="site"> Site</label>
            <input class="form-control" id="site" name="site" placeholder="Site" value="<?= $r[0]->site ?>" required />
        </div>

        <div class="col-sm-6">
            <label for="email"> Email</label>
            <input class="form-control" id="email" name="email" placeholder="Email" value="<?= $r[0]->email ?>" required />
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-3">
            <label for="phone"><i class="fa fa-phone"></i> Telefone 1</label>
            <input class="form-control" id="phone" name="phone" placeholder="Telefone" value="<?= $r[0]->phone ?>" />
        </div>

        <div class="col-sm-3">
            <label for="phonetwo"><i class="fa fa-phone"></i> Telefone 2</label>
            <input class="form-control" id="phonetwo" name="phonetwo" placeholder="Telefone" value="<?= $r[0]->phonetwo ?>" />
        </div>

        <div class="col-sm-3">
            <label for="whatsapp"><i class="fa fa-whatsapp"></i> Whatsapp </label>
            <input class="form-control"  id="whatsapp" name="whatsapp" placeholder="Whatsapp" value="<?= $r[0]->whatsapp ?>" />
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-12">
            <label for="maps"><i class="fa fa-map"></i> Localização </label>
            <input class="form-control" id="maps" name="maps" placeholder="Endereço Google Maps" value="<?= $r[0]->maps ?>" />
        </div>

        <div class="clearfix"></div>
        <hr>

        <div class="col-sm-12">
            <label for="well">Home</label>
            <textarea class="form-control ckeditor" id="well" placeholder="Bem-vindo"><?= $r[0]->well ?></textarea>
        </div>

        <div class="col-sm-12">
            <label for="service">Atendimento</label>
            <textarea class="form-control ckeditor" id="service" placeholder="Atendimento"><?= $r[0]->service ?></textarea>
        </div>

        <div class="col-sm-12">
            <label for="contact">Entre em contato</label>
            <textarea class="form-control ckeditor" id="contact" placeholder="Entre em contato"><?= $r[0]->contact ?></textarea>
        </div>

        <div class="clearfix"></div>
        <hr>

        <div class="col-xs-12">
            <label for="metakeyword"><i class="fa fa-chrome"></i> Key Words</label>
            <input class="form-control" id="metakeyword" placeholder="Key Words" value="<?= $r[0]->metakeyword ?>" />
        </div>

        <div class="col-xs-12">
            <label for="metadescription"><i class="fa fa-chrome"></i> Descrição para o Google</label>
            <textarea class="form-control" id="metadescription" placeholder="Descrição para o Google"><?= $r[0]->metadescription ?></textarea>
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-6">
            <label for="facebook"><i class="fa fa-facebook"></i> Facebook</label>
            <input class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="<?= $r[0]->facebook ?>" />
        </div>

        <div class="col-sm-6">
            <label for="instagram"><i class="fa fa-instagram"></i> Instagram</label>
            <input class="form-control" id="instagram" autocomplete='instagram' name="instagram" placeholder="Instagram" value="<?= $r[0]->instagram ?>" />
        </div>

        <div class="clearfix"></div>

        <div class="col-sm-4">
            <label for="adwords"><i class="fa fa-chrome"></i> Adwords</label>
            <textarea class="form-control" id="adwords" placeholder="<- adwords ->"><?= $r[0]->adwords ?></textarea>
        </div>

        <div class="col-sm-4">
            <label for="analytics"><i class="fa fa-chrome"></i> Analytics</label>
            <textarea class="form-control" id="analytics" placeholder="<- analytics ->"><?= $r[0]->analytics ?></textarea>
        </div>

        <div class="col-sm-4">
            <label for="pixel"><i class="fa fa-chrome"></i> Pixel facebook</label>
            <textarea class="form-control" id="pixel" placeholder="<- pixel ->"><?= $r[0]->pixel ?></textarea>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12">
            <br>
            <button class="btn btn-blue" type="submit">Alterar</button>
        </div>

    </div>
</form>

<script src="../<?= COMPONENTS . 'jquery/jquery.mask.min.js' ?>"></script>
<script src="../<?= JS_CMS . 'config.js' ?>"></script>
<script>
    $(document).ready(function() {
        $('#cep').mask('00.000-000')
        $('#phone').mask('(00) 00000-0009')
        $('#phonetwo').mask('(00) 00000-0009')
        $('#whatsapp').mask('(00) 00000-0009')
    });
</script>
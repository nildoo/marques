<?php
$Db->setParams([
    'table' => 'equipe',
    'condition' => [
        'id' => $this->params['id']
    ]
]);
$r = $Db->result();
if(!empty($r)){

?>
<form id="u-form-equipe" enctype="multipart/form-data">

    <div class="row">

        <input type="hidden" id="id" name="id" value="<?= $r[0]->id ?>">

        <div class="col-sm-3">
            <label for="nome">Nome</label>
            <input class="form-control" id="nome" name="nome" value="<?= $r[0]->nome ?>" placeholder="Nome" required>
        </div>
        <div class="col-sm-3">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="0" <?= ($r[0]->tipo == 0 ? "Selected" : "") ?>>Advogado</option>
                <option value="1" <?= ($r[0]->tipo == 1 ? "Selected" : "") ?>>Colaborador</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label for="oab">OAB</label>
            <input class="form-control" id="oab" name="oab" value="<?= $r[0]->oab ?>"  placeholder="OAB">
        </div>
        <div class="col-sm-3">
            <label for="link">Link Currículo</label>
            <input class="form-control" id="link" name="link" value="<?= $r[0]->link ?>"  placeholder="http" required>
        </div>
        <div class="col-sm-3">
            <label for="foto">Foto</label>
            <input class="form-control" id="foto" name="foto" type="file">
        </div>

        <div class="col-xs-12">
            <label for="experiencia">Experiência</label>
            <textarea class="form-control ckeditor" id="experiencia" rows="5"
                      placeholder="Experiência"><?= $r[0]->experiencia ?></textarea>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-12">
            <div class="">
                <img src="<?= '../' . IMG . 'adv/' . $r[0]->foto ?>" alt="" height="100px">
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12">
            <br>
            <button class="btn btn-blue" type="submit"><i class="fa fa-refresh"></i> Alterar</button>
            <button class="btn btn-red" id="remover"><i class="fa fa-trash-o"></i> Remover</button>
        </div>

    </div>
</form>
<?php } else {?>
    <script>
        window.location = "equipe";
    </script>
<?php }?>

<script src="../<?= JS_CMS . 'equipe.js' ?>"></script>
<?php
$Db->setParams([
    'table' => 'expertise',
    'condition' => [
        'id' => $this->params['id']
    ]
]);
$r = $Db->result();
//var_dump($r);
if (!empty($r)) {

?>
    <form id="u-form-atuacao">

        <div class="row">

            <input type="hidden" id="id" name="id" value="<?= $r[0]->id ?>">

            <div class="col-sm-4">
                <label for="titulo">Título</label>
                <input class="form-control" id="titulo" name="titulo" value="<?= $r[0]->title ?>" placeholder="Título" required>
            </div>

            <div class="col-md-4">
                <label class="label-mark-cms">
                    <input id="publicado" type="checkbox" <?= ($r[0]->active == 1 ? "checked" : null)?> />
                    <span>Publicado</span>
                </label>
            </div>

            <div class="col-xs-12">
                <label for="conteudo">Conteúdo</label>
                <textarea class="form-control ckeditor" id="conteudo" rows="5" placeholder="Conteúdo"><?= $r[0]->content ?></textarea>
            </div>

            <div class="col-sm-4">
                <label for="img">Imagem</label>
                <input class="form-control" id="img" name="img" type="file">
            </div>

            <div class="clearfix"></div>

            <?php if (!empty($r[0]->img)) { ?>
                <div class="col-sm-4">
                    <label for="img">Foto</label>
                    <div class="thumbnail">
                        <img src="../<?= IMG . 'service/' . $r[0]->img ?>" alt="" height="90">
                    </div>
                </div>
            <?php } ?>

            <div class="clearfix"></div>

            <div class="col-md-12">
                <br>
                <button class="btn btn-blue" type="submit"><i class="fa fa-refresh"></i> Alterar</button>
                <button class="btn btn-red" id="remover"><i class="fa fa-trash-o"></i> Remover</button>
            </div>

        </div>
    </form>
<?php } else { ?>
    <script>
        window.location = "atuacao";
    </script>
<?php } ?>

<script src="../<?= JS_CMS . 'atuacao.js' ?>"></script>
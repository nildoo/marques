<?php
$Db->setParams([
    'table' => 'banner',
    'condition' => [
        'id' => $this->params['id']
    ]
]);
$r = $Db->result();
if (!empty($r)) {

?>
    <form id="u-form-banner">

        <div class="row">

            <input type="hidden" id="id" name="id" value="<?= $r[0]->id ?>">

            <div class="col-sm-4">
                <label for="titulo">Título</label>
                <input class="form-control" id="titulo" name="titulo" value="<?= $r[0]->title ?>" placeholder="Título" required>
            </div>

            <div class="col-md-4">
                <label class="label-mark-cms">
                    <input id="publicado" type="checkbox" <?= ($r[0]->active == 1 ? "checked" : null) ?> />
                    <span>Publicado</span>
                </label>
            </div>

            <div class="col-xs-12">
                <label for="conteudo">Conteúdo</label>
                <textarea class="form-control" id="conteudo" rows="5" placeholder="Conteúdo"><?= $r[0]->content ?></textarea>
            </div>

            <div class="col-sm-4">
                <label for="link">Link</label>
                <input class="form-control" id="link" name="link" value="<?= $r[0]->link ?>" placeholder="Link" required>
            </div>
            <div class="col-sm-4">
                <label for="target">Target</label>
                <select class="form-control" name="target" id="target">
                    <option value="">Selecione</option>
                    <option value="_blank">_blank</option>
                    <option value="_self">_Self</option>
                    <option value="_top">_Top</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="button">Texto do Botão</label>
                <input class="form-control" id="button" name="button" value="<?= $r[0]->button ?>" placeholder="Texto do Botão" required>
            </div>

            <div class="col-sm-4">
                <label for="img">Imagem</label>
                <input class="form-control" id="img" name="img" type="file">
            </div>

            <div class="clearfix"></div>

            <?php if ($r[0]->img) { ?>
                <div class="col-sm-4">
                    <label for="img">Banner</label>
                    <div class="thumbnail">
                        <img src="../<?= IMG . 'banner/' . $r[0]->img ?>" alt="" height="90">
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
        window.location = "banner";
    </script>
<?php } ?>

<script src="../<?= JS_CMS . 'banner.js' ?>"></script>
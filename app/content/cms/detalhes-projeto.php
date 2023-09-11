<?php
$Db->setParams([
    'table' => 'project',
    'condition' => [
        'id' => $this->params['id']
    ]
]);
$r = $Db->result();
if (!empty($r)) {

?>
    <form id="u-form-projeto">

        <div class="row">

            <input type="hidden" id="id" name="id" value="<?= $r[0]->id ?>">

            <div class="col-sm-3">
                <label for="titulo">Título</label>
                <input class="form-control" id="titulo" name="titulo" value="<?= $r[0]->name ?>" placeholder="Título" required>
            </div>

            <div class="col-sm-4">
                <label for="img">Imagem</label>
                <input class="form-control" id="img" name="img" type="file">
            </div>

            <div class="clearfix"></div>

            <?php if ($r[0]->img) { ?>
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
        window.location = "projetos";
    </script>
<?php } ?>

<script src="../<?= JS_CMS . 'projeto.js' ?>"></script>
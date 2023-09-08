<form id="form-parecer">

    <div class="col-sm-6">
        <label for="titulo">Título</label>
        <input class="form-control" id="titulo" name="titulo" placeholder="Título" required>
    </div>

    <div class="col-xs-12">
        <label for="conteudo">Conteúdo</label>
        <textarea class="form-control ckeditor" id="conteudo" placeholder="Conteúdo" required></textarea>
    </div>

    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-balance-scale"></i> Tag</div>
            <div class="panel-body">
                <?php
                $Db->setParams(['table' => 'atuacao','order by' => 'id ASC']);
                $tags = $Db->result();

                foreach ($tags as $tag){
                ?>
                <label class="label-mark">
                    <input type="checkbox" name="tag[]" value="<?= $tag->id?>">
                    <span><?= $tag->titulo?></span>
                </label>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <button class="btn btn-blue"><i class="fa fa-save"></i> Salvar</button>
    </div>
</form>

<script src="../<?= JS_CMS . 'parecer.js' ?>"></script>
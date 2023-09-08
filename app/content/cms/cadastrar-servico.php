<form id="form-servico">

    <div class="col-sm-4">
        <label for="titulo">Título</label>
        <input class="form-control" id="titulo" name="titulo" placeholder="Título" required>
    </div>
    <div class="col-md-4">
        <label class="label-mark-cms">
            <input id="publicado" type="checkbox">
            <span>Publicado</span>
        </label>
    </div>
    <div class="col-xs-12">
        <label for="conteudo">Conteúdo</label>
        <textarea class="form-control ckeditor" id="conteudo" placeholder="Conteúdo" required></textarea>
    </div>
    <div class="col-sm-4">
        <label for="img">Imagem</label>
        <input class="form-control" id="img" name="img" type="file">
    </div>
    <div class="col-xs-12">
        <button class="btn btn-blue"><i class="fa fa-save"></i> Salvar</button>
    </div>
</form>
<div class="clearfix"></div>
<script src="../<?= JS_CMS . 'servico.js' ?>"></script>
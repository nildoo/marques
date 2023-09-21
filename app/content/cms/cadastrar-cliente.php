<form id="form-cliente">

    <div class="col-sm-4">
        <label for="titulo">Título</label>
        <input class="form-control" id="titulo" name="titulo" placeholder="Título" required>
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
<script src="../<?= JS_CMS . 'cliente.js' ?>"></script>
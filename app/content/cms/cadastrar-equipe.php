<form id="form-equipe">

    <div class="col-sm-3">
        <label for="nome">Colaborador</label>
        <input class="form-control" id="nome" name="nome" placeholder="Nome" required>
    </div>
    <div class="col-sm-3">
        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo" class="form-control" required>
            <option value="0">Advogado</option>
            <option value="1">Colaborador</option>
        </select>
    </div>
    <div class="col-sm-3">
        <label for="oab">OAB</label>
        <input class="form-control sdv" id="oab" name="oab" placeholder="OAB">
    </div>
    <div class="col-sm-3">
        <label for="link">Link Currículo</label>
        <input class="form-control" id="link" name="link" placeholder="http" required>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-3">
        <label for="foto">Foto</label>
        <input class="form-control" id="foto" name="foto" type="file" required>
    </div>
    <div class="col-xs-12">
        <label for="experiencia">Experiência</label>
        <textarea class="form-control ckeditor" id="experiencia" placeholder="Experiência" required></textarea>
    </div>
    <div class="col-xs-12">
        <button class="btn btn-blue"><i class="fa fa-save"></i> Salvar</button>
    </div>
</form>
<div class="clearfix"></div>
<script src="../<?= JS_CMS . 'equipe.js' ?>"></script>
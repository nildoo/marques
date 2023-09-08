<form id="form-perfil">

    <div class="col-sm-4">
        <label for="nome">Nome</label>
        <input class="form-control" id="nome" required placeholder="Nome">
    </div>
    <div class="col-sm-4">
        <label for="email">E-mail</label>
        <input class="form-control" id="email" type="email" required placeholder="E-mail">
    </div>
    <div class="col-sm-4">
        <label for="senha">Senha</label>
        <input class="form-control" id="senha" type="password" required placeholder="Senha">
    </div>
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-lock"></i> Permissão</div>
            <div class="panel-body">
                <label class="label-mark">
                    <input type="radio" name="permissao[]" id="permissao-1"
                           value="1" <?= ($user->permission == 1 ? "checked" : "") ?> required>
                    <span>Administrador</span>
                </label>
                <label class="label-mark">
                    <input type="radio" name="permissao[]" id="permissao-2"
                           value="2" <?= ($user->permission == 2 ? "checked" : "") ?> required>
                    <span>Consultor</span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <button class="btn btn-blue"><i class="fa fa-save"></i> Salvar</button>
    </div>
</form>
<div class="clearfix"></div>
<script src="../<?= JS_CMS . 'perfil.js' ?>"></script>
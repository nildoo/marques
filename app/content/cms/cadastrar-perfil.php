<div class="container-fluid">
    <div class="row">
        <form id="form-perfil">
            <div class="col-sm-4">
                <label for="nome">Nome</label>
                <input class="form-control" id="nome" placeholder="Nome" required>
            </div>
            <div class="col-sm-4">
                <label for="email">E-mail</label>
                <input class="form-control" id="email" type="email" placeholder="E-mail" required>
            </div>
            <div class="col-sm-4">
                <label for="senha">Senha</label>
                <input class="form-control" id="senha" type="password" placeholder="Senha" required>
            </div>

            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-lock"></i> Permissão</div>
                    <div class="panel-body">
                        <label class="label-mark">
                            <input type="radio" name="permission" value="1" required>
                            <span>Administrador</span>
                        </label>
                        <label class="label-mark">
                            <input type="radio" name="permission" value="2" required>
                            <span>Corretor</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <button class="btn btn-blue" type="submit"><i class="fa fa-save"></i> Salvar</button>
            </div>
        </form>
    </div>
</div>
<script src="../<?= JS_CMS . 'perfil.js' ?>"></script>
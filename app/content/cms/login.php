<div id="page-login">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="text-center">
                            <img src="../<?= IMG . 'netmidia.png' ?>">
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="form-group" id="form-login-cms">
                            <label for="email">E-mail</label>
                            <input class="form-control" id="email" type="email" placeholder="E-mail" required>

                            <br>

                            <label for="senha">Senha</label>
                            <input class="form-control" id="senha" type="password" placeholder="Senha" required>

                            <br>

                            <div class="text-center">
                                <button class="btn btn-blue" type="submit">
                                    Entrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</div>

<script src="../<?= JS_CMS . 'login.js' ?>"></script>
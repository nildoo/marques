<?php
$Db->setParams([
    'table' => 'user',
    'condition' => [
        'id' => $this->params['id']
    ]
]);

$r = $Db->result();
//var_dump($r);

if (!empty($r)) {
    foreach ($r as $user) { ?>
        <form id="u-form-perfil">

            <input id="id" type="hidden" value="<?= $user->id ?>">

            <div class="col-sm-4">
                <label for="nome">Nome</label>
                <input class="form-control" id="nome" required placeholder="Nome" value="<?= $user->name ?>">
            </div>
            <div class="col-sm-4">
                <label for="email">E-mail</label>
                <input class="form-control" id="email" type="email" required placeholder="E-mail"
                       value="<?= $user->email ?>">
            </div>
            <div class="col-sm-4">
                <label for="senha">Senha</label>
                <input class="form-control" id="senha" type="password" required placeholder="Senha"
                       value="<?= $user->password ?>">
            </div>

            <?php if($_SESSION['usuario'][0]->permission == 1) {?>

            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-lock"></i> Permissão</div>
                    <div class="panel-body">
                        <label class="label-mark-proximity">
                            <input type="radio" name="permissao[]" id="permissao-1" value="1" <?= ($user->permission == 1 ? "checked" : "")?> required >
                            <span>Administrador</span>
                        </label>
                        <label class="label-mark-proximity">
                            <input type="radio" name="permissao[]" id="permissao-2" value="2" <?= ($user->permission == 2 ? "checked" : "")?> required >
                            <span>Consultor</span>
                        </label>
                    </div>
                </div>
            </div>
            <?php }?>
            <div class="col-xs-12">
                <button class="btn btn-blue" type="submit"><i class="fa fa-refresh"></i> Alterar</button>
                <button class="btn btn-red" id="remover"><i class="fa fa-trash-o"></i> Remover</button>
            </div>
        </form>
        <div class="clearfix"></div>
        <script src="../<?= JS_CMS . 'perfil.js' ?>"></script>
    <?php }
} else { ?>
    <script>
        window.location = "usuarios";
    </script>
<?php } ?>
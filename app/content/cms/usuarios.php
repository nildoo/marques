<a class="btn btn-green" href="cadastrar-usuario"><i class="fa fa-plus"></i> Usuário</a>
<hr>
<?php

$Db->setParams([
    'table' => 'user',
    'order' => 'name ASC',
]);

$r = $Db->result();

function permissao($tipo){
    switch ($tipo){
        case 1:
            return "Administrador";
            break;
        case 2:
            return "Consultor";
            break;
    }
}

if (!empty($r)) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td><i class="fa fa-users"></i> Nome</td>
                <td>Email</td>
                <td>Senha</td>
                <td>Permissão</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($r as $value) { ?>
                <tr onclick="detalhes(<?= $value->id ?>)">
                    <td><?= $value->name ?></td>
                    <td><?= $value->email ?></td>
                    <td><?= $value->password?></td>
                    <td><?= permissao($value->permission) ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Nenhum Usuário cadastrado...</h4>
    </div>
<?php } ?>

<script>
    function detalhes(id) {
        window.location = "detalhes-perfil-" + id;
    }
</script>

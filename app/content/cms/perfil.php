<a class="btn btn-green" href="cadastrar-perfil">Cadastrar Usuário</a>
<hr>
<?php

$Db->setParams([
    'table' => 'admin',
    'order' => 'id DESC',
]);

$r = $Db->result();

if (!empty($r)) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td><i class="fa fa-user"></i> Usuários</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($r as $value) { ?>
                <tr onclick="detalhes(<?= $value->id ?>)">
                    <td><?= $value->nome ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Nenhum Usuário cadastrado ainda...</h4>
    </div>
<?php } ?>

<script>
    function detalhes(id) {
        window.location = "detalhes-perfil-" + id;
    }
</script>
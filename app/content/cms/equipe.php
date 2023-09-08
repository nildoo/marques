<a class="btn btn-green" href="cadastrar-equipe">Cadastrar Colaborador</a>
<hr>
<?php

$Db->setParams([
    'table' => 'equipe',
    'order' => 'nome ASC',
]);

$r = $Db->result();

if (!empty($r)) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td><i class="fa fa-user"></i> Nome</td>
                <td>Tipo</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($r as $value) { ?>
                <tr onclick="detalhes(<?= $value->id ?>)">
                    <td><?= $value->nome ?></td>
                    <td><?= ($value->tipo == 0 ? "Advogado" : "Colaborador") ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Nenhum Colaborador cadastrado...</h4>
    </div>
<?php } ?>

<script>
    function detalhes(id) {
        window.location = "detalhes-equipe-" + id;
    }
</script>

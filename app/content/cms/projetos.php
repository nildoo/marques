<a class="btn btn-green" href="cadastrar-projeto"><i class="fa fa-plus"></i> Projeto</a>
<hr>
<?php

$Db->setParams([
    'table' => 'project',
    'order' => 'name ASC',
]);

$r = $Db->result();

if (!empty($r)) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <td style="width: 10%;"><i class="fa fa-address-card-o"></i> Data</td>
                    <td>Nome</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($r as $value) { ?>
                    <tr onclick="detalhes(<?= $value->id ?>)">
                        <td><?= date('d/m/Y', strtotime($value->created_at)) ?></td>
                        <td><?= $value->name ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Nenhum Projeto cadastrado...</h4>
    </div>
<?php } ?>

<script>
    function detalhes(id) {
        window.location = "detalhes-projeto-" + id;
    }
</script>
<a class="btn btn-green" href="cadastrar-atuacao"><i class="fa fa-plus"></i> Atuação</a>
<hr>
<?php

$Db->setParams([
    'table' => 'expertise',
    'order' => 'title ASC',
]);

$r = $Db->result();

if (!empty($r)) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                 <td><i class="fa fa-balance-scale"></i> Área de Atuação</td>
                 <td>Pblicado</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($r as $value) { ?>
                <tr onclick="detalhes(<?= $value->id ?>)">
                    <td><?= $value->title ?></td>
                    <td><?= ($value->active == 1 ? "Sim" : "Não") ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Nenhuma Atuação cadastrada...</h4>
    </div>
<?php } ?>

<script>
    function detalhes(id) {
        window.location = "detalhes-atuacao-" + id;
    }
</script>

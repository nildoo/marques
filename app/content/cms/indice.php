<a class="btn btn-green" href="cadastrar-indice"><i class="fa fa-plus"></i> Indice</a>
<hr>
<?php

$Db->setParams([
    'table' => 'indice',
    'order' => 'name ASC',
]);

$r = $Db->result();

if (!empty($r)) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td>Indice</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($r as $value) { ?>
                <tr onclick="detalhes(<?= $value->id ?>)">
                    <td><?= $value->name ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Nenhum Indice cadastrado...</h4>
    </div>
<?php } ?>

<script>
    function detalhes(id) {
        window.location = "detalhes-indice-" + id;
    }
</script>

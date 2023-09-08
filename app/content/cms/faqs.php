<a class="btn btn-green" href="cadastrar-faqs"><i class="fa fa-plus"></i> Pergunta</a>
<hr>
<?php

$Db->setParams([
    'table' => 'faqs as f',
    'fields' => 'f.*, i.name as indiceNome',
    'clause' => 'INNER JOIN indice as i ON i.id = f.f_id_indice'
]);

$r = $Db->result();
//var_dump($r);

if (!empty($r)) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td><i class="fa fa-question-circle"></i> Pergunta</td>
                <td>Indice</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($r as $value) { ?>
                <tr onclick="detalhes(<?= $value->id ?>)">
                    <td><?= $value->ask ?></td>
                    <td><?= $value->indiceNome?></td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Nenhuma Pergunta cadastrada...</h4>
    </div>
<?php } ?>

<script>
    function detalhes(id) {
        window.location = "detalhes-faqs-" + id;
    }
</script>

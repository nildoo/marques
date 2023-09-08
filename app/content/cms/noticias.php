<a class="btn btn-green" href="cadastrar-noticia"><i class="fa fa-plus"></i> Artigo</a>
<hr>
<?php

$Db->setParams([
    'table' => 'blog',
    'order' => 'title ASC',
]);

$r = $Db->result();

if (!empty($r)) { ?>
    <div class="table-responsive">
        <table class="table table-modalidade table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="width: 10%;"><i class="fa fa-newspaper-o"></i> Data</td>
                <td>Título</td>
                <td>Publicado</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($r as $value) { ?>
                <tr onclick="detalhes(<?= $value->id ?>)">
                    <td><?= date('d/m/Y', strtotime($value->created_at)) ?></td>
                    <td><?= $value->title ?></td>
                    <td><?= ($value->active == 1 ? "Sim" : "Não") ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Nenhum Artigo cadastrado...</h4>
    </div>
<?php } ?>

<script>
    function detalhes(id) {
        window.location = "detalhes-noticia-" + id;
    }
</script>

<a class="btn btn-green" href="cadastrar-banner">Cadastrar Banner</a>
<hr>
<?php

$Db->setParams([
    'table' => 'banner',
    'order' => 'title ASC',
]);

$r = $Db->result();

if (!empty($r)) { ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td style="width: 10%;"><i class="fa fa-rss-square"></i> Data</td>
                <td>Título</td>
                <td>Conteudo</td>
                <td>Publicado</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($r as $value) { ?>
                <tr onclick="detalhes(<?= $value->id ?>)">
                    <td><?= date('d/m/Y', strtotime($value->created_at)) ?></td>
                    <td><?= $value->title ?></td>
                    <td><?= $value->content ?></td>
                    <td><?= ($value->active == 1 ? "Sim" : "Não") ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <h4>Nenhum Parecer cadastrado...</h4>
    </div>
<?php } ?>

<script>
    function detalhes(id) {
        window.location = "detalhes-banner-" + id;
    }
</script>

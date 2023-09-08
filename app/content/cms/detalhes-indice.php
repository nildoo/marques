<?php

$Db->setParams([
    'table' => 'indice',
    'condition' => [
        'id' => $this->params['id']
    ]
]);

$r = $Db->result();

if (!empty($r)) {
    foreach ($r as $indice) { ?>

        <form id="u-form-indice">

            <input id="id" type="hidden" value="<?= $indice->id ?>">

            <div class="col-md-4">
                <label for="nome">Indice</label>
                <input class="form-control" id="nome" placeholder="Indice" required value="<?= $indice->name ?>">
            </div>

            <div class="clearfix"></div>

            <div class="col-xs-12">
                <br>
                <button class="btn btn-blue" type="submit"><i class="fa fa-refresh"></i> Alterar</button>
                <button class="btn btn-red" id="remover"><i class="fa fa-trash-o"></i> Remover</button>
            </div>

        </form>

        <script src="../<?= JS_CMS . 'indice.js' ?>"></script>

    <?php }
} else { ?>
    <script>
        window.location = 'indice';
    </script>
<?php } ?>
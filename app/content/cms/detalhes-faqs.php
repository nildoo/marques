<?php
$Db->setParams([
    'table' => 'faqs',
    'condition' => [
        'id' => $this->params['id']
    ]
]);
$r = $Db->result();

$Db->setParams([
    'table' => 'indice',
    'order' => 'name ASC'
]);
$indice = $Db->result();
//var_dump($r);
if (!empty($r)) {
    foreach ($r as $value) {
?>
        <div class="col-xs-12">
            <form id="u-form-faqs">

                <input type="hidden" id="id" value="<?= $value->id ?>">


                <div class="col-md-4">
                    <label for="ask">Cliente</label>
                    <input class="form-control" id="ask" value="<?= $value->ask ?>" name="ask" placeholder="Pergunta" required>
                </div>

                <div class="col-md-4">
                    <label for="ask">Indice</label>
                    <select class="form-control" value="indice" id="indice">
                        <option>Selecione</option>
                        <?php foreach ($indice as $item) { ?>
                            <option value="<?= $item->id ?>" <?= ($value->f_id_indice == $item->id ? "selected" : null) ?>><?= $item->name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="clearfix"></div>

                <label for="resposta">Resposta</label>
                <textarea class="form-control ckeditor" id="answer" placeholder="Resposta" required><?= $value->answer ?></textarea>
        </div>

        <div class="col-xs-12" style="margin: 0">
            <br>
            <button class="btn btn-blue" type="submit"><i class="fa fa-refresh"></i> Alterar</button>
            <button class="btn btn-red" id="remover"><i class="fa fa-trash-o"></i> Remover</button>
        </div>
        </form>

        </div>
        <script src="../<?= JS_CMS . 'faqs.js' ?>"></script>
    <?php }
} else { ?>
    <script>
        window.location = 'faqs';
    </script>
<?php } ?>
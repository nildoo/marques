<?php
$Db->setParams(['table' => 'compliance']);
$about = $Db->result();
$r = $about[0];
//var_dump($r);
?>

<form id="form-compliance">

    <input id="id" type="hidden" value="<?= $r->id ?>">

    <div class="col-xs-12">
        <label for="conteudo">Compliance</label>
        <textarea class="form-control ckeditor" id="conteudo" placeholder="Compliance" required><?= $r->content ?></textarea>
    </div>
    <div class="col-xs-12">
        <button class="btn btn-blue" type="submit">Alterar</button>
    </div>
</form>

<br>
<br>

<form id="form-img" enctype="multipart/form-data">
    <div class="col-md-4">
        <label for="imgs">Adicionar Arquivos PDF</label>
        <div class="input-group">
            <input class="form-control" id="img" name="img[]" type="file" multiple>
            <span class="input-group-addon" id="add-img"><i class="fa fa-plus"></i></span>
        </div>
    </div>
</form>

<div class="col-md-12">
    <ul>
        <?php

        $Db->setParams([
            'table' => 'complia_archive',
            'condition' => [
                'f_id_compliance' => $r->id
            ],
            'order' => 'id ASC'
        ]);

        $pdf = $Db->result();

        foreach ($pdf as $img) { ?>
            <li class="ui-state-default" id="<?= $img->id ?>" style="display: inline-block;">
                <div class="cms-img text-center">
                    <i class="fa fa-file-pdf-o"></i>
                    <br />
                    <button class="btn btn-sm btn-red remover" type="button" data-id="<?= $img->id ?>">
                        Remover
                    </button>
                </div>
            <?php } ?>
            </li>
    </ul>

</div>

<script src="../<?= JS_CMS . 'compliance.js' ?>"></script>
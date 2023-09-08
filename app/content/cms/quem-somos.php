<?php
$Db->setParams(['table' => 'about']);
$about = $Db->result();
$r = $about[0];
//var_dump($r);
?>

<form id="form-institucional">

    <div class="col-xs-6">
        <label for="empresa">Quem Somos</label>
        <textarea class="form-control ckeditor" id="empresa" placeholder="Quem Somos" required><?= $r->content ?></textarea>
    </div>

    
    <div class="col-md-6">
        <label for="missao">Missão</label>
        <textarea class="form-control ckeditor" id="missao" placeholder="Missão" required><?= $r->legacy ?></textarea>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-6">
        <label for="visao">Visão</label>
        <textarea class="form-control ckeditor" id="visao" placeholder="Visão" required><?= $r->overview ?></textarea>
    </div>
    <div class="col-md-6">
        <label for="valores">Valores</label>
        <textarea class="form-control ckeditor" id="valores" placeholder="Valores" required><?= $r->worth ?></textarea>
    </div>

    <div class="col-sm-4">
        <label for="img">Imagem</label>
        <input class="form-control" id="img" name="img" type="file">
    </div>

    <div class="clearfix"></div>

    <?php if(!empty($r->img)){?>
    <div class="col-sm-4">
        <label for="img">Imagem</label>
        <div class="thumbnail">
            <img src="../<?= IMG . 'about/' . $r->img?>" alt="" height="90">
        </div>
    </div>
    <?php } ?>

    <div class="clearfix"></div>

    <br>
    <button class="btn btn-blue" type="submit">Alterar</button>

</form>

<script src="../<?= JS_CMS . 'institucional.js' ?>"></script>
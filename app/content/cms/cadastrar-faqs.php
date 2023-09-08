
<?php 
$Db->setParams([
    'table' => 'indice',
    'order' => 'name ASC'
]);
$indice = $Db->result();
//var_dump($indice);
?>
<form id="form-faqs">

    <div class="col-md-4">
        <label for="ask">Pergunta</label>
        <input class="form-control" id="ask" name="ask" placeholder="Pergunta" required>
    </div>

    <div class="col-md-4">
        <label for="ask">Indice</label>
        <select class="form-control" value="indice" id="indice">
            <option>Selecione</option>
            <?php foreach($indice as $item){?>
            <option value="<?= $item->id?>"><?= $item->name?></option>
            <?php } ?>
        </select>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12">
        <label for="answer">Resposta</label>
        <textarea class="form-control ckeditor" id="answer" placeholder="Resposta"></textarea>
    </div>

    <div class="col-xs-12">
        <button class="btn btn-blue"><i class="fa fa-save"></i> Salvar</button>
    </div>
</form>
<div class="clearfix"></div>
<script src="../<?= JS_CMS . 'faqs.js' ?>"></script>
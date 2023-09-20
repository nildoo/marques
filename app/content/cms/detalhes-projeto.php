<?php
$Db->setParams([
    'table' => 'project',
    'condition' => [
        'id' => $this->params['id']
    ]
]);
$r = $Db->result();
if (!empty($r)) {

?>
    <form id="u-form-projeto">

        <div class="row">

            <input type="hidden" id="id" name="id" value="<?= $r[0]->id ?>">

            <div class="col-sm-3">
                <label for="titulo">Título</label>
                <input class="form-control" id="titulo" name="titulo" value="<?= $r[0]->name ?>" placeholder="Título" required>
            </div>

            <div class="col-md-4">
                <label class="label-mark-cms">
                    <input id="publicado" type="checkbox" <?= ($r[0]->active == 1 ? "checked" : null)?> />
                    <span>Publicado</span>
                </label>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12">
                <button class="btn btn-blue" type="submit"><i class="fa fa-refresh"></i> Alterar</button>
                <button class="btn btn-red" id="remover"><i class="fa fa-trash-o"></i> Remover</button>
            </div>

        </div>
    </form>


    <div class="clearfix"></div>

    <form id="form-img" enctype="multipart/form-data">
        <div class="col-md-4">
            <label for="img">Adicionar Imagens do Projeto</label>
            <div class="input-group">
                <input class="form-control" id="img" name="img[]" type="file" multiple>
                <span class="input-group-addon" id="add-img"><i class="fa fa-plus"></i></span>
            </div>
        </div>
    </form>

    <div class="clearfix"></div>


    <div class="compliance">
        <div class="row">
            <ul id="sortable">
                <?php
                $Db->setParams([
                    'table' => 'project_img',
                    'condition' => [
                        'f_id_project' => $r[0]->id
                    ],
                    'order' => 'id ASC'
                ]);
                $imgs = $Db->result();
                //var_dump($imgs);
                foreach ($imgs as $img) { ?>
                    <li id="<?= $img->id ?>" style="display: inline-block;">
                        <div class="cms-img text-center">
                            <img class="handle" src="../<?= IMG  . 'galeria/' . $img->img ?>" style="height: 150px;">
                            <br><br>
                            <button class="btn btn-sm btn-red remover-foto" type="button" data-id="<?= $img->id ?>">
                                Remover
                            </button>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sortable").sortable({
                handle: '.handle',
                update: function() {
                    var order = $('#sortable').sortable('toArray');
                    $.ajax({
                        data: {
                            action: 'alterar-ordem',
                            ordem: order
                        },
                        dataType: 'json',
                        type: 'post',
                        url: '../app/actions/cms/action.php',
                        success: function(response) {
                            if (response.error === true) {
                                alert(response.msg);
                            }
                        }
                    });
                }
            });
        });
    </script>

<?php } else { ?>
    <script>
        window.location = "projetos";
    </script>
<?php } ?>

<script src="../<?= JS_CMS . 'projeto.js' ?>"></script>
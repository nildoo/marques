<?php
$id = explode('-', $this->params['project']);
$Db->setParams([
    'table' => 'project',
    'free_condition' => "id = '{$id[0]}' AND active = 1"
]);
$project = $Db->result();
?>
<section class="navegation-page" style="padding: 267px 0; background: url('<?= IMG . 'top-service.jpg' ?>') center center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $project[0]->name ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray pd-100">
    <?php
    //var_dump($project);
    if (!empty($project)) {
    ?>
        <div class="blog">
            <div class="container">
                <div class="row text-center">
                    <ul class="galery-product">
                        <?php
                        $Db->setParams([
                            'table' => 'project_img',
                            'condition' => [
                                'f_id_project' => $project[0]->id
                            ],
                            'order' => 'id ASC'
                        ]);
                        $imgs = $Db->result();

                        //var_dump($imgs);
                        foreach ($imgs as $img) { ?>

                            <a href="<?= IMG . 'galeria/' . $img->img ?>" class="lsb-preview" data-lsb-group="project">
                                <li style="background: url('<?= IMG . 'galeria/' . $img->img ?>') center center no-repeat;"></li>
                            </a>
                        <?php } ?>
                    </ul>

                    <div class="clearfix"></div>

                    <div class="col-sm-12 text-center">
                        <br />
                        <br />
                        <a href="services"><button class="btn btn-blue"><i class="fa fa-arrow-left"></i> Voltar</button></a>
                    </div>

                </div>
            </div>
        </div>
    <?php } else {
    ?>
</section>
<div>
    <script>
        window.location = 'initial';
    </script>
</div>
<?php } ?>
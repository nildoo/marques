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
                <div class="row">
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
                        <div class="col-sm-3">
                            <div class="text-center">
                                <img class="thumbnail" src="<?= IMG  . 'galeria/' . $img->img ?>" style="height: 250px;">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } else {
    ?>
</section>
<div>
    <script>
        window.location = 'blog-fullpage';
    </script>
</div>
<?php } ?>
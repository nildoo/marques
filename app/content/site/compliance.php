<?php
$Db->setParams([
    'table' => 'compliance'
]);
$compliances = $Db->result();
?>
<section class="navegation-page" style="padding: 267px 0; background: url('<?= IMG . 'full.jpg' ?>') top center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>&nbsp;</h1>
            </div>
        </div>
    </div>
</section>

<section class="pd-100 bg-white compliance">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <?= $compliances[0]->content ?>
            </div>
            <div class="col-sm-5">
                <div class="picture">
                    <img src="<?= IMG . 'compliance.png' ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-gray pd-100 archive">
    <div class="title">
        <h1>Programa de Compliance </h1>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $Db->setParams([
                'table' => 'complia_archive',
                'condition' => [
                    'f_id_compliance' => 1
                ]
            ]);
            $items = $Db->result();
            foreach ($items as $item) {

                $extensao = explode(".", $item->img);

            ?>
                <a href="<?= IMG . 'compliance/' . $item->img?>" target="_blank">
                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <i class="fas fa-file-pdf"></i>
                                <h1><?= $extensao[0] ?></h1>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</section>
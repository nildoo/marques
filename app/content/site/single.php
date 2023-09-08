<section class="navegation-page" style="background: url('<?= IMG . 'full.jpg' ?>')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog</h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray pd-100">
<?php
$id = explode('-', $this->params['single']);
$Db->setParams([
    'table' => 'blog',
    'free_condition' => "id = '{$id[0]}' AND active = 1"
]);
$blog = $Db->result();
//var_dump($blog);
if (!empty($blog)) {
    foreach ($blog as $news) { ?>
        <div class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                        <div class="blog-spot">
                            <div class="blog-image-main">
                                <img src="<?= IMG . 'blog/' . $news->img ?>" alt="">
                            </div>
                            <div class="blog-spot-content">
                                <h1><?= $news->title?></h1>
                                <div class="subtitulo"><?= $news->content?></div>
                                <div class="blog-info blog-info-top">
                                    <div class="entry">
                                        <i class="fas fa-calendar-alt"></i> <?= date('d/m/Y', strtotime($news->created_at))?>
                                    </div>
                                    <div class="entry">
                                        <a href="#" onclick="history.back()"><i class="fas fa-angle-left"></i> Voltar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} else {
    ?>
</section>
    <div>
        <script>
            window.location = 'blog-fullpage';
        </script>
    </div>
<?php } ?>
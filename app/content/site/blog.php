<section class="navegation-page" style="background: url('<?= IMG . 'full.jpg' ?>')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog</h1>
            </div>
        </div>
    </div>
</section>

<section class="pd-100 bg-gray">
    <div class="container blog">
        <div class="row">
            <?php
            $Db->setParams([
                'table' => 'blog',
                'condition' => [
                    'active' => 1
                ]
            ]);
            $blog = $Db->result();
            //var_dump($blog);die;
            foreach ($blog as $value) { ?>
                <div class="col-md-4">
                    <article>
                        <a href="single-<?= $value->id . '-' . $value->url ?>">
                            <div class="image" style="background-image:url(<?= IMG . 'blog/' . $value->img ?>)">
                                <img src="<?= IMG . 'news/blog-1.jpg' ?>" alt="">
                            </div>
                            <div class="entry entry-table">
                                <div class="date-wrapper">
                                    <div class="date">
                                        <span><?= strftime('%h', strtotime($value->created_at)) ?></span>
                                        <strong><?= date('d', strtotime($value->created_at)) ?></strong>
                                        <span><?= date('Y', strtotime($value->created_at)) ?></span>
                                    </div>
                                </div>
                                <div class="title">
                                    <h2 class="h5"><?= mb_strimwidth($value->title, 0, 90, '...') ?></h2>
                                </div>
                            </div>
                            <div class="show-more">
                                <span class="btn btn-darkBlue btn-block">Leia mais</span>
                            </div>
                        </a>
                    </article>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
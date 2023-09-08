<section class="navegation-page" style="background-image:url('<?= IMG . 'full.jpg' ?>')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Áreas de Atuação</h1>
            </div>
        </div>
    </div>
</section>

<section class="page-area pd-100">
    <div class="ct-area-title">
        <div class="item-subtitle">
            <span> PRACTICE AREA </span>
        </div>
        <div class="item-title">
            <span>What We Cover</span>
        </div>
    </div>
    <div class="ct-content">
        <div class="text-editor">
            <p>Decision Are A Professional Attorney & Lawyers Services Provider Institutions. Suitable For Law Firm, Injury Law, Traffic Ticket Attorney, Legacy And More.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php for ($i = 0; $i <= 5; $i++) { ?>
                <div class="col-sm-4 text-center">
                    <div class="ct-area-inter">
                        <div class="ct-icon">
                            <i class="fa fa-balance-scale"></i>
                        </div>
                        <div class="ct-meta">
                            <div class="item-title">
                                <span>Criminal Law</span>
                            </div>
                            <div class="item-except"> Lorem Ipsum is simply dummy text of the printing and typesetting industry simply dummy text typesetting.</div>
                            <div class="item-readmore"> <a href="single-area-<?php ?>"> <span> Leia mais </span> </a></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

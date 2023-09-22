<section class="navegation-page" style="padding: 267px 0; background: url('<?= IMG . 'top-service.jpg' ?>') center center; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Nossas Soluções Metalúrgicas</h1>
            </div>
        </div>
    </div>
</section>

<section class="pd-80 service">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p>
                    Na Marques Montagens, oferecemos uma ampla gama de serviços para atender as demandas mais
                    exigentes do mercado.
                </p>
                <p>
                    Nossa equipe especializada está pronta para desenvolver soluções customizadas para a sua empresa.
                    <hr>
                </p>
            </div>

            <div class="clearfix"></div>

            <div class="col-sm-4">
                <div class="contentService">
                    <h1>Corte Plasma, Quilhotina <span>e Dobradeira:</span></h1>
                    <div class="description">
                        Contamos com equipamentos de alta precisão para cortes e dobras de chapas
                        em diversos materiais.
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contentService">
                    <h1>Prensagem e <span>Calandragem:</span></h1>
                    <div class="description">
                        Executamos trabalhos de prensagem e calandragem com pefeição e eficiência.
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contentService">
                    <h1>Torneamento e <span>Usinagem:</span></h1>
                    <div class="description">
                        Os precessos de torneamento e usinagem garantem produtos finais de qualidade excepcional.
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="chapp">
            <div class="row">
                <div class="col-sm-4">
                    <div class="picture">

                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="contentService">
                        <h1>Fornecimento de Chapas e Perfis:</h1>
                        <div class="description">
                            Oferemos uma variada linha de chapas e perfis em aço inoxidável e carbono para atender suas necessidades.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>

<section class="pd-80 bg-gray portifolio">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Veja alguns Projetos Desenvolvidos</h1>
            </div>
            <?php
            $Db->setParams([
                'table' => 'project',
                'condition' => [
                    'active' => '1'
                ],
                'order' => 'id ASC'
            ]);
            $projects = $Db->result();
            //var_dump($projects);
            foreach ($projects as $picture) {
                $Db->setParams([
                    'table' => 'project_img',
                    'condition' => [
                        'f_id_project' => $picture->id
                    ],
                    'limit' => '1',
                    'order' => 'position, f_id_project ASC'
                ]);
                $imgs = $Db->result();
                //var_dump($imgs);
                if (!empty($imgs)) {
            ?>
                    <div class="col-sm-4">
                        <a href="project-<?= $picture->id . '-' . $picture->url ?>">
                            <div class="picture thumbnail">
                                <img src="<?= IMG . 'galeria/' . $imgs[0]->img ?>" class="image">
                                <div class="overlay">
                                    <div class="icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <h2><?= $picture->name?></h2>
                        </a>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</section>

<section class="pd-80 bg-blue">
    <div class="newContact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titleForm">
                        <h1>Independentemente do segmento da sua empresa, nossa expertise e <span>compromisso
                                com a qualidade garantirão resultados impressionantes.</span></h1>
                        <h2>Entre em contato agora!</span>
                        </h2>
                    </div>
                </div>
                <div class="pd-line-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <form id='form-contact'>
                                <div class="col-sm-12">
                                    <input class="form-control" name="nome" id="nome" placeholder="Nome*" required />
                                </div>
                                <div class="col-sm-12">
                                    <input class="form-control" name="empresa" id="empresa" placeholder="Empresa*" required />
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" name="telefone" id="telefone" placeholder="(DDD)+Telefone" required />
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required />
                                </div>
                        </div>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="projeto" id="projeto" cols="30" rows="5" placeholder="Qual o seu projeto?" required></textarea>
                            <div class="col-sm-12">
                                <div class="pull-right">
                                    <br />
                                    <button class="btn btn-green" type="submit">ENVIAR</button>
                                </div>
                            </div>
                            </form>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-sm-12">
                            <div class="">
                                <ul class="whatsapp">
                                    <li>
                                        <h1>Atendemos também pelo <span>Whatsapp</span></h1>
                                    </li>
                                    <li>
                                        <a href="https://api.whatsapp.com/send?phone=55<?= $config->whatsapp ?>&#038;text=O que posso estar ajudando você?" target="_blank">
                                            <img src="<?= IMG . 'botao_iniciar_conversa2.png' ?>" alt="">
                                        </a>    
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
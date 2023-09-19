<?php

session_start();

$response = (object)['error' => false, 'msg' => null, 'data' => null];

require_once '../../../libs/Db.php';
require_once '../../../libs/Methods.php';

$Db = new Db();
$Methods = new Methods();

switch ($_POST['action']) {

 //LOGIN CMS

    case 'login':

        $Db->setParams([
            'table' => 'user',
            'condition' => [
                'email' => $_POST['email'],
                'password' => $_POST['senha'],
            ]
        ]);

        $r = $Db->result();

        if ($r == true) {
            $_SESSION['usuario'] = $r;
        } elseif ($r === false) {
            $response->error = true;
            $response->msg = "Ops! Ocorreu um erro ao realizar o login...";
        } elseif (empty($r)) {
            $response->error = true;
            $response->msg = "Dados de acesso incorretos!";
        } else {
            $response->error = true;
            $response->msg = "Ops! Erro desconhecido...";
        }

        break;
    case 'logout':
        session_destroy();
        break;

//CADASTRAR BANNER
case 'insert-banner':

    $pasta = "../../assets/img/banner/";

    $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
    $newFile = uniqid() . $fileType;
    if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {
        move_uploaded_file($_FILES['img']['tmp_name'], $pasta . $newFile);
    }

    if(!empty($_FILES['img']['name'])){

        $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

        $Db->setParams([
            'table' => 'banner',
            'data' => [
                'title' => $_POST['titulo'],
                'content' => $_POST['conteudo'],
                'img' => $newFile,
                'link' => $_POST['link'],
                'target' => $_POST['target'],
                'button' => $_POST['button'],
                'active' => $ativo
            ]
        ]);
    } else {

        $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

        $Db->setParams([
            'table' => 'banner',
            'data' => [
                'title' => $_POST['titulo'],
                'content' => $_POST['conteudo'],
                'link' => $_POST['link'],
                'target' => $_POST['target'],
                'button' => $_POST['button'],
                'active' => $ativo
            ]
        ]);
    }
    //var_dump();

    if (!$Db->insert()) {
        $response->error = true;
        $response->msg = "Aconteceu um erro ao cadastrar banner.";
    }

    break;


//ALTERAR SERVIÇO

case 'update-banner':

    if (isset($_FILES['img']['name'])) {

        $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
        $newFile = uniqid() . $fileType;
        if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {

            $Db->setParams([
                'table' => 'banner',
                'condition' => [
                    'id' => $_POST['id'],
                ]
            ]);

            $r = $Db->result();
            //var_dump($r);

            @unlink('../../assets/img/banner/' . $r[0]->img);

            if (!$Db->update()) {
                $response->error = true;
                $response->msg = "Aconteceu um erro ao cadastrar banner.";
            }

            move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/banner/' . $newFile);

            $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

            $Db->setParams([
                'table' => 'banner',
                'data' => [
                    'title' => $_POST['titulo'],
                    'content' => $_POST['conteudo'],
                    'img' => $newFile,
                    'link' => $_POST['link'],
                    'target' => $_POST['target'],
                    'button' => $_POST['button'],
                    'active' => $ativo
                ],
                'condition' => [
                    'id' => $_POST['id']
                ]
            ]);
            //var_dump($_POST);
            $u = $Db->update();

            if ($u !== true) {
                $response->error = true;
                $response->msg = "Erro ao alterar textos.";
            }
        }
    }

    $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

    $Db->setParams([
        'table' => 'banner',
        'data' => [
            'title' => $_POST['titulo'],
            'content' => $_POST['conteudo'],
            'link' => $_POST['link'],
            'target' => $_POST['target'],
            'button' => $_POST['button'],
            'active' => $ativo
        ],
        'condition' => [
            'id' => $_POST['id']
        ]
    ]);
    //var_dump($_POST);
    $u = $Db->update();

    if ($u !== true) {
        $response->error = true;
        $response->msg = "Erro ao alterar textos.";
    }

    break;

//REMOVER BANNER
case
'delete-banner':

    $Db->setParams(['table' => 'banner', 'condition' => ['id' => $_POST['id']]]);
    $r = $Db->result();

    if($r[0]->img != null){
        unlink('../../assets/img/banner/' . $r[0]->img);
    }

    $Db->setParams(['table' => 'banner', 'condition' => ['id' => $_POST['id']]]);
    $Db->delete();

    break;


//ALTERAR CONFIG

    case 'alterar-config':

        $Db->setParams([
            'table' => 'config',
            'data' => [
                'titlesite' => $_POST['titulo'],
                'address' => $_POST['endereco'],
                'district' => $_POST['bairro'],
                'city' => $_POST['cidade'],
                'state' => $_POST['uf'],
                'zipcode' => $_POST['cep'],
                'obs' => $_POST['obs'],
                'pobox' => $_POST['caixaPostal'],
                'site' => $_POST['site'],
                'email' => $_POST['email'],
                'phone' => $_POST['telefone'],
                'phonetwo' => $_POST['telefone2'],
                'whatsapp' => $_POST['whatsapp'],
                'maps' => $_POST['inf'],
                'well' => $_POST['well'],
                'service' => $_POST['service'],
                'contact' => $_POST['contact'],
                'metakeyword' => $_POST['key_word'],
                'metadescription' => $_POST['description'],
                'facebook' => $_POST['facebook'],
                'instagram' => $_POST['instagram'],
                'adwords' => $_POST['adwords'],
                'analytics' => $_POST['analytics'],
                'pixel' => $_POST['pixel'],
            ],
            'condition' => [
                'id' => 1
            ]
        ]);
        //var_dump($_POST);
        $u = $Db->update();
        if ($u !== true) {
            $response->error = true;
            $response->msg = "Erro ao alterar Configurações.";
        }
        break;


//CADASTRAR USUARIO

    case 'insert-perfil':
        $Db->setParams([
            'table' => 'user',
            'data' => [
                'name' => $_POST['nome'],
                'email' => $_POST['email'],
                'password' => $_POST['senha'],
                'permission' => $_POST['permissao'][0],
            ]
        ]);
        if (!$Db->insert()) {
            $response->error = true;
            $response->msg = "Erro ao cadastrar usuário.";
        }
        break;

//ALTERAR USUARIO

    case 'update-perfil':

        $Db->setParams([
            'table' => 'user',
            'data' => [
                'name' => $_POST['nome'],
                'email' => $_POST['email'],
                'password' => $_POST['senha'],
                'permission' => $_POST['permissao'][0],
            ],
            'condition' => [
                'id' => $_POST['id']
            ]
        ]);

        //var_dump($_POST); //die;

        $u = $Db->update();

        if ($u !== true) {
            $response->error = true;
            $response->msg = "Erro ao alterar usuário!";
        }

        break;

//DELETE USUARIO

    case 'delete-perfil':

        $Db->setParams([
            'table' => 'user',
            'condition' => [
                'id' => $_POST['id']
            ]
        ]);

        // var_dump($_POST);

        if ($Db->delete() !== true) {
            $response->error = true;
            $response->msg = "Erro ao deletar usuário";
        }

        break;

//ALTERAR QUEM SOMOS

    case 'update-about':

        if (isset($_FILES['img']['name'])) {

            $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
            $newFile = uniqid() . $fileType;
            if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {

                $Db->setParams([
                    'table' => 'about',
                    'condition' => [
                        'id' => 1,
                    ]
                ]);

                $r = $Db->result();

                @unlink('../../assets/img/about/' . $r[0]->img);

                if (!$Db->update()) {
                    $response->error = true;
                    $response->msg = "Aconteceu um erro ao cadastrar quem somos.";
                }

                move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/about/' . $newFile);


                $Db->setParams([
                    'table' => 'about',
                    'data' => [
                        'content' => $_POST['empresa'],
                        'legacy' => $_POST['missao'],
                        'overview' => $_POST['visao'],
                        'worth' => $_POST['valores'],
                        'img' => $newFile,
                    ],
                    'condition' => [
                        'id' => 1
                    ]
                ]);

                $u = $Db->update();

                if ($u !== true) {
                    $response->error = true;
                    $response->msg = "Erro ao alterar textos.";
                }
            }
        }

        $Db->setParams([
            'table' => 'about',
            'data' => [
                'content' => $_POST['empresa'],
                'legacy' => $_POST['missao'],
                'overview' => $_POST['visao'],
                'worth' => $_POST['valores'],
            ],
            'condition' => [
                'id' => 1
            ]
        ]);

        $u = $Db->update();

        if ($u !== true) {
            $response->error = true;
            $response->msg = "Erro ao alterar textos.";
        }

        break;

//ALTERAR COMPLIANCE
case 'update-compliance':

        $Db->setParams([
            'table' => 'compliance',
            'data' => [
                'content' => $_POST['conteudo'],
            ],
            'condition' => [
                'id' => 1
            ]
        ]);

        $u = $Db->update();

        if ($u !== true) {
            $response->error = true;
            $response->msg = "Erro ao alterar textos.";
        }

    break;

//COMPLIANCE ARCHIVES
case 'insert-img':

    $files = null;
    foreach ($_FILES as $files) {
    }

    $pasta = "../../assets/img/compliance/";

    for ($i = 0; $i < count($files['name']); $i++) {

        $arqType = explode('/', $files['type'][$i]);
        $arqTemp = $files['tmp_name'][$i];
        $arqError = $files['error'][$i];
        $arqName =  $files['name'][$i];//. '.' . $arqType[1];

        move_uploaded_file($arqTemp, $pasta . $arqName);

        $Db->setParams([
            'table' => 'complia_archive',
            'data' => [
                'f_id_compliance' => $_POST['id'],
                'img' => $arqName,
            ]
        ]);
        //var_dump($_POST);

        $Db->insert();
    }
    
    break;
//REMOVER COMPLIANCE ARCHIVES

    case 'remover-img':

        $Db->setParams(['table' => 'complia_archive', 'condition' => ['id' => $_POST['id']]]);
        $r = $Db->result();
        //var_dump($r);die;

        unlink('../../assets/img/compliance/' . $r[0]->img);

        $Db->setParams(['table' => 'complia_archive', 'condition' => ['id' => $_POST['id']]]);
        $Db->delete();

        break;

//CADASTRAR NOTICIA

    case 'insert-blog':

        $pasta = "../../assets/img/blog/";

        $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
        $newFile = uniqid() . $fileType;
        if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {
            move_uploaded_file($_FILES['img']['tmp_name'], $pasta . $newFile);
        }

        $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

        $Db->setParams([
            'table' => 'blog',
            'data' => [
                'title' => $_POST['titulo'],
                'url' => $Methods->urlAmigavel($_POST['titulo']),
                'content' => $_POST['conteudo'],
                'img' => $newFile,
                'active' => $ativo
            ]
        ]);

        if (!$Db->insert()) {
            $response->error = true;
            $response->msg = "Aconteceu um erro ao cadastrar artigo.";
        }

        break;

//ALTERAR NOTICIA

    case 'update-blog':

        if (isset($_FILES['img']['name'])) {

            $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
            $newFile = uniqid() . $fileType;
            if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {

                $Db->setParams([
                    'table' => 'blog',
                    'condition' => [
                        'id' => $_POST['id'],
                    ]
                ]);

                $r = $Db->result();
                //var_dump($r);

                @unlink('../../assets/img/blog/' . $r[0]->img);

                if (!$Db->update()) {
                    $response->error = true;
                    $response->msg = "Aconteceu um erro ao cadastrar artigo.";
                }

                move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/blog/' . $newFile);

                $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

                $Db->setParams([
                    'table' => 'blog',
                    'data' => [
                        'title' => $_POST['titulo'],
                        'url' => $Methods->urlAmigavel($_POST['titulo']),
                        'content' => $_POST['conteudo'],
                        'img' => $newFile,
                        'active' => $ativo
                    ],
                    'condition' => [
                        'id' => $_POST['id']
                    ]
                ]);
                var_dump($_POST);
                $u = $Db->update();

                if ($u !== true) {
                    $response->error = true;
                    $response->msg = "Erro ao alterar textos.";
                }
            }
        }

        $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

        $Db->setParams([
            'table' => 'blog',
            'data' => [
                'title' => $_POST['titulo'],
                'url' => $Methods->urlAmigavel($_POST['titulo']),
                'content' => $_POST['conteudo'],
                'active' => $ativo
            ],
            'condition' => [
                'id' => $_POST['id']
            ]
        ]);
        //var_dump($_POST['publicado']);
        $u = $Db->update();

        if ($u !== true) {
            $response->error = true;
            $response->msg = "Erro ao alterar textos.";
        }

        break;

//REMOVER NOTICIA

    case
    'delete-blog':

        $Db->setParams(['table' => 'blog', 'condition' => ['id' => $_POST['id']]]);
        $r = $Db->result();

        unlink('../../assets/img/blog/' . $r[0]->img);

        $Db->setParams(['table' => 'blog', 'condition' => ['id' => $_POST['id']]]);
        $Db->delete();

        break;

 
//CADASTRAR SERVIÇO

    case 'insert-service':

        $pasta = "../../assets/img/service/";

        $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
        $newFile = uniqid() . $fileType;
        if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {
            move_uploaded_file($_FILES['img']['tmp_name'], $pasta . $newFile);
        }

        if(!empty($_FILES['img']['name'])){

            $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

            $Db->setParams([
                'table' => 'servicesoffered',
                'data' => [
                    'title' => $_POST['titulo'],
                    'url' => $Methods->urlAmigavel($_POST['titulo']),
                    'content' => $_POST['conteudo'],
                    'img' => $newFile,
                    'active' => $ativo
                ]
            ]);
        } else {

            $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

            $Db->setParams([
                'table' => 'servicesoffered',
                'data' => [
                    'title' => $_POST['titulo'],
                    'url' => $Methods->urlAmigavel($_POST['titulo']),
                    'content' => $_POST['conteudo'],
                    'active' => $ativo
                ]
            ]);
        }
        //var_dump();

        if (!$Db->insert()) {
            $response->error = true;
            $response->msg = "Aconteceu um erro ao cadastrar Serviço.";
        }

        break;


//ALTERAR SERVIÇO

    case 'update-service':

        if (isset($_FILES['img']['name'])) {

            $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
            $newFile = uniqid() . $fileType;
            if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {

                $Db->setParams([
                    'table' => 'servicesoffered',
                    'condition' => [
                        'id' => $_POST['id'],
                    ]
                ]);

                $r = $Db->result();
                //var_dump($r);

                @unlink('../../assets/img/service/' . $r[0]->img);

                if (!$Db->update()) {
                    $response->error = true;
                    $response->msg = "Aconteceu um erro ao cadastrar Serviço.";
                }

                move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/service/' . $newFile);

                $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

                $Db->setParams([
                    'table' => 'servicesoffered',
                    'data' => [
                        'title' => $_POST['titulo'],
                        'url' => $Methods->urlAmigavel($_POST['titulo']),
                        'content' => $_POST['conteudo'],
                        'img' => $newFile,
                        'active' => $ativo
                    ],
                    'condition' => [
                        'id' => $_POST['id']
                    ]
                ]);
                //var_dump($_POST);
                $u = $Db->update();

                if ($u !== true) {
                    $response->error = true;
                    $response->msg = "Erro ao alterar textos.";
                }
            }
        }

        $ativo = ($_POST['publicado'] == 'true' ? 1 : 0);

        $Db->setParams([
            'table' => 'servicesoffered',
            'data' => [
                'title' => $_POST['titulo'],
                'url' => $Methods->urlAmigavel($_POST['titulo']),
                'content' => $_POST['conteudo'],
                'active' => $ativo
            ],
            'condition' => [
                'id' => $_POST['id']
            ]
        ]);
        //var_dump($_POST['publicado']);
        $u = $Db->update();

        if ($u !== true) {
            $response->error = true;
            $response->msg = "Erro ao alterar textos.";
        }

        break;

//REMOVER SERVIÇO

    case
    'delete-service':

        $Db->setParams(['table' => 'servicesoffered', 'condition' => ['id' => $_POST['id']]]);
        $r = $Db->result();

        if($r[0]->img != null){
            unlink('../../assets/img/service/' . $r[0]->img);
        }

        $Db->setParams(['table' => 'servicesoffered', 'condition' => ['id' => $_POST['id']]]);
        $Db->delete();

        break;


//CADASTRAR PROJETO
case 'insert-projeto':

    $pasta = "../../assets/img/galeria/";

    $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
    $newFile = uniqid() . $fileType;
    if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {
        move_uploaded_file($_FILES['img']['tmp_name'], $pasta . $newFile);
    }

    if(!empty($_FILES['img']['name'])){

        $Db->setParams([
            'table' => 'project',
            'data' => [
                'name' => $_POST['titulo'],
                'img' => $newFile,
            ]
        ]);
    } else {

        $Db->setParams([
            'table' => 'servicesoffered',
            'data' => [
                'name' => $_POST['titulo'],
            ]
        ]);
    }
    //var_dump();

    if (!$Db->insert()) {
        $response->error = true;
        $response->msg = "Aconteceu um erro ao cadastrar Projeto.";
    }

    break;


//ALTERAR PROJETO
case 'update-projeto':

    if (isset($_FILES['img']['name'])) {

        $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
        $newFile = uniqid() . $fileType;
        if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {

            $Db->setParams([
                'table' => 'project',
                'condition' => [
                    'id' => $_POST['id'],
                ]
            ]);

            $r = $Db->result();
            //var_dump($r);

            @unlink('../../assets/img/galeria/' . $r[0]->img);

            if (!$Db->update()) {
                $response->error = true;
                $response->msg = "Aconteceu um erro ao cadastrar prejeto.";
            }

            move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/galeria/' . $newFile);

            $Db->setParams([
                'table' => 'project',
                'data' => [
                    'name' => $_POST['titulo'],
                    'img' => $newFile,
                ],
                'condition' => [
                    'id' => $_POST['id']
                ]
            ]);
            //var_dump($_POST);
            $u = $Db->update();

            if ($u !== true) {
                $response->error = true;
                $response->msg = "Erro ao alterar textos.";
            }
        }
    }

    $Db->setParams([
        'table' => 'project',
        'data' => [
            'name' => $_POST['titulo'],
        ],
        'condition' => [
            'id' => $_POST['id']
        ]
    ]);
    //var_dump($_POST['publicado']);
    $u = $Db->update();

    if ($u !== true) {
        $response->error = true;
        $response->msg = "Erro ao alterar textos.";
    }

    break;


//REMOVER SERVIÇO
case 'delete-projeto':

    $Db->setParams(['table' => 'project', 'condition' => ['id' => $_POST['id']]]);
    $r = $Db->result();

    if($r[0]->img != null){
        unlink('../../assets/img/galeria/' . $r[0]->img);
    }

    $Db->setParams(['table' => 'project', 'condition' => ['id' => $_POST['id']]]);
    $Db->delete();

    break;

//CADASTRAR CLIENTE
case 'insert-client':

    $pasta = "../../assets/img/service/";

    $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
    $newFile = uniqid() . $fileType;
    if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {
        move_uploaded_file($_FILES['img']['tmp_name'], $pasta . $newFile);
    }

    if(!empty($_FILES['img']['name'])){

        $Db->setParams([
            'table' => 'client',
            'data' => [
                'name' => $_POST['titulo'],
                'img' => $newFile,
            ]
        ]);
    } else {

        $Db->setParams([
            'table' => 'client',
            'data' => [
                'name' => $_POST['titulo'],
            ]
        ]);
    }
    //var_dump();

    if (!$Db->insert()) {
        $response->error = true;
        $response->msg = "Aconteceu um erro ao cadastrar cliente.";
    }

    break;


//ALTERAR CLIENTE
case 'update-client':

    if (isset($_FILES['img']['name'])) {

        $fileType = strtolower(substr($_FILES['img']['name'], strrpos($_FILES['img']['name'], '.')));
        $newFile = uniqid() . $fileType;
        if ($fileType == '.jpg' || $fileType == '.jpeg' || $fileType == '.png') {

            $Db->setParams([
                'table' => 'client',
                'condition' => [
                    'id' => $_POST['id'],
                ]
            ]);

            $r = $Db->result();
            //var_dump($r);

            @unlink('../../assets/img/service/' . $r[0]->img);

            if (!$Db->update()) {
                $response->error = true;
                $response->msg = "Aconteceu um erro ao cadastrar cliente.";
            }

            move_uploaded_file($_FILES['img']['tmp_name'], '../../assets/img/service/' . $newFile);

            $Db->setParams([
                'table' => 'client',
                'data' => [
                    'name' => $_POST['titulo'],
                    'img' => $newFile,
                ],
                'condition' => [
                    'id' => $_POST['id']
                ]
            ]);
            //var_dump($_POST);
            $u = $Db->update();

            if ($u !== true) {
                $response->error = true;
                $response->msg = "Erro ao alterar textos.";
            }
        }
    }

    $Db->setParams([
        'table' => 'client',
        'data' => [
            'name' => $_POST['titulo'],
        ],
        'condition' => [
            'id' => $_POST['id']
        ]
    ]);
    //var_dump($_POST['publicado']);
    $u = $Db->update();

    if ($u !== true) {
        $response->error = true;
        $response->msg = "Erro ao alterar textos.";
    }

    break;

//REMOVER CLIENTE
case 'delete-client':

    $Db->setParams(['table' => 'client', 'condition' => ['id' => $_POST['id']]]);
    $r = $Db->result();

    if($r[0]->img != null){
        unlink('../../assets/img/service/' . $r[0]->img);
    }

    $Db->setParams(['table' => 'client', 'condition' => ['id' => $_POST['id']]]);
    $Db->delete();

    break;
}

echo json_encode($response);

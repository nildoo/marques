<?php

$routes['cms'] = [
    'login' => ['template' => 'base-cms'],
    'perfil' => ['template' => 'default-cms'],
    'painel' => ['template' => 'default-cms'],
    'banner' => ['template' => 'default-cms'],
    'config' => ['template' => 'default-cms'],
    'quem-somos' => ['template' => 'default-cms'],
    'compliance' => ['template' => 'default-cms'],
    'noticias' => ['template' => 'default-cms'],
    'servicos' => ['template' => 'default-cms'],
    'projetos' => ['template' => 'default-cms'],
    'clientes' => ['template' => 'default-cms'],
    'usuarios' => ['template' => 'default-cms'],

    'cadastrar-banner' => ['template' => 'default-cms'],
    'detalhes-banner' => ['template' => 'default-cms'],
    // 'cadastrar-noticia' => ['template' => 'cms-editor'],
    // 'detalhes-noticia' => ['template' => 'cms-editor'],
    'cadastrar-servico' => ['template' => 'default-cms'],
    'detalhes-servico' => ['template' => 'default-cms'],
    'cadastrar-cliente' => ['template' => 'default-cms'],
    'detalhes-cliente' => ['template' => 'default-cms'],
    'cadastrar-projeto' => ['template' => 'default-cms'],
    'detalhes-projeto' => ['template' => 'default-cms'],
    'cadastrar-usuario' => ['template' => 'default-cms'],
    'detalhes-perfil' => ['template' => 'default-cms'],

 ];

$routes['site'] = [
    'initial' => ['template' => 'default-site'],
    'about-us' => ['template' => 'default-site'],
    'services' => ['template' => 'default-site'],
    'clients' => ['template' => 'default-site'],
    'blog' => ['template' => 'default-site'],
    'single' => ['template' => 'default-site'],
    'compliance' => ['template' => 'default-site'],
    'contact-us' => ['template' => 'default-site'],
    'work-us' => ['template' => 'default-site'],
];

return $routes;
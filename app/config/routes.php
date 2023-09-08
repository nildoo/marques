<?php

$routes['cms'] = [
    'login' => ['template' => 'base-cms'],
    'perfil' => ['template' => 'default-cms'],
    'painel' => ['template' => 'default-cms'],
    'banner' => ['template' => 'default-cms'],
    'config' => ['template' => 'default-cms'],
    'quem-somos' => ['template' => 'default-cms'],
    'noticias' => ['template' => 'default-cms'],
    'atuacao' => ['template' => 'default-cms'],
    'pareceres' => ['template' => 'default-cms'],
    'indice' => ['template' => 'default-cms'],
    'faqs' => ['template' => 'default-cms'],
    'servicos' => ['template' => 'default-cms'],
    'equipe' => ['template' => 'default-cms'],
    'usuarios' => ['template' => 'default-cms'],

    'cadastrar-banner' => ['template' => 'default-cms'],
    'detalhes-banner' => ['template' => 'default-cms'],
    'cadastrar-atuacao' => ['template' => 'default-cms'],
    'detalhes-atuacao' => ['template' => 'default-cms'],
    'cadastrar-noticia' => ['template' => 'cms-editor'],
    'detalhes-noticia' => ['template' => 'cms-editor'],
    'cadastrar-parecer' => ['template' => 'default-cms'],
    'cadastrar-indice' => ['template' => 'default-cms'],
    'detalhes-indice' => ['template' => 'default-cms'],
    'cadastrar-faqs' => ['template' => 'default-cms'],
    'detalhes-faqs' => ['template' => 'default-cms'],
    'cadastrar-equipe' => ['template' => 'default-cms'],
    'detalhes-equipe' => ['template' => 'default-cms'],
    'cadastrar-usuario' => ['template' => 'default-cms'],
    'detalhes-perfil' => ['template' => 'default-cms'],
    'cadastrar-servico' => ['template' => 'default-cms'],
    'detalhes-servico' => ['template' => 'default-cms'],

 ];

$routes['site'] = [
    'initial' => ['template' => 'default-site'],
    'about-us' => ['template' => 'default-site'],
    'services' => ['template' => 'default-site'],
    'clients' => ['template' => 'default-site'],
    'blog' => ['template' => 'default-site'],
    'single' => ['template' => 'default-site'],
    'complience' => ['template' => 'default-site'],
    'contact-us' => ['template' => 'default-site'],
];

return $routes;
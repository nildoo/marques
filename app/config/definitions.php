<?php

/* Locale and Timezone */
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

/* Applications Path */
define('APP', 'app/');
define('ASSETS', APP . 'assets/');
define('CLASSES', APP . 'classes/');
define('CONFIG', APP . 'config/');
define('CONTENT', APP . 'content/');

define('ERRORS', CONTENT . 'errors/');
define('TEMPLATES', CONTENT . 'templates/');

/* Assets Path */
define('CSS', ASSETS . 'css/');
define('FONTS', ASSETS . 'fonts/');
define('IMG', ASSETS . 'img/');
define('JS', ASSETS . 'js/');
define('JS_CMS', ASSETS . 'js/cms/');
define('COMPONENTS', ASSETS . 'components/');

define('CMS', CONTENT . 'cms/');
define('SITE', CONTENT . 'site/');

/* Headers Definitions */
define('AUTHOR', 'Agência Netmidia - Sistemas Web');

/* Menu Definitions */
define('MENU_SITE', [
    'initial'=>'Home',
    'about-us'=>'Quem Somos',
    'services'=>'Nossos Serviços',
    'clients'=>'Clientes',
    'complience'=>'Complience',
    'contact-us'=>'Fale Conosco'
]);

//perguntas por area
// Corpo Jurídico (talvez não seja necessário)

define('MENU_CMS', [
    'painel' => 'Painel',
    'banner' => 'Banner',
    'config' => 'Config',
    'quem-somos' => 'Quem Somos',
    'clientes' => 'Clientes',
    //'atuacao' => 'Atuação',
    //'indice' => 'Indice',
    //'faqs' => 'Faqs',
    'noticias' => 'Blog',
    'servicos' => 'Serviços',
]);
define('ICON_MENU', [
    'painel' => 'fa-desktop',
    'banner' => 'fa-picture-o',
    'config' => 'fa-gear',
    'quem-somos' => 'fa-suitcase',
    'atuacao' => 'fa-balance-scale',
    'indice' => 'fa-info-circle',
    'faqs' => 'fa-question-circle',
    'noticias' => 'fa-newspaper-o',
    'servicos' => 'fa-address-card-o',
]);

/* Project Definitions */

/* Development debug */
define('DEBUG', true);

if (DEBUG === false) {
    error_reporting(0);
    ini_set("display_errors", 'Off');
} else {
    error_reporting(E_ALL);
    ini_set("display_errors", 'On');
}
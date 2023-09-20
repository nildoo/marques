<?php

namespace Libs;

class Routes
{

    protected $path;
    protected $url = 'initial';
    protected $app = 'site';
    protected $content;
    protected $template;
    protected $params;

    public function __construct()
    {
        $this->url = !empty($_GET['url']) ? $_GET['url'] : $this->url;
        $this->parseUrl();
        $this->render();
    }

    protected function parseUrl()
    {

        if ($this->url == 'cms') {
            header('Location: cms/login');
        }

        if ($this->url == 'cms/') {
            header('Location: login');
        }

        $cms = strstr($this->url, 'cms/');
        if ($cms !== false) {

            $this->app = 'cms';

            $url = explode('/', $this->url);

            $details = strpos($url[1], 'detalhes');

            if ($details !== false) {

                $url = explode('-', $url[1]);
                $this->params = ['id' => $url[2]];
                unset($url[2]);
                $url = implode('-', $url);
                $this->url = $url;

            } else {

                $this->url = $url[1];

            }

        }

        if ($this->app == 'site') {
            $details = strpos($this->url, 'detalhes');
            if ($details !== false) {

                $details = explode('-', $this->url);
                $this->url = $details[0];
                unset($details[0]);
                $details = implode('-', $details);

                $this->params = ['detalhes' => $details];

            }
        }

        if ($this->app == 'site') {
            $details = strpos($this->url, 'single');
            if ($details !== false) {

                $details = explode('-', $this->url);
                $this->url = $details[0];
                unset($details[0]);
                $details = implode('-', $details);

                $this->params = ['single' => $details];
            }
        }


        if ($this->app == 'site') {
            $details = strpos($this->url, 'project');
            if ($details !== false) {

                $details = explode('-', $this->url);
                $this->url = $details[0];
                unset($details[0]);
                $details = implode('-', $details);

                $this->params = ['project' => $details];
            }
        }

        $routes = require_once CONFIG . 'routes.php';

        $this->path = CONTENT . $this->app . '/';

        if (key_exists($this->url, $routes[$this->app]) && file_exists($this->path . $this->url . '.php')) {
            $this->template = key_exists('template', $routes[$this->app][$this->url]) ? $routes[$this->app][$this->url]['template'] . '.php' : null;
        } else {
            $this->path = ERRORS;
            $this->url = '404';
        }

        $this->content = $this->path . $this->url . '.php';

    }

    protected function render()
    {

        session_start();

        require_once 'Db.php';
        require_once 'Methods.php';

        $Db = new \Db();
        $Methods = new \Methods();

        if ($this->app == 'cms' && $this->url !== 'login' && !isset($_SESSION['usuario'])) {
            header('Location: login');
        }

        if ($this->template !== null) {
            return require_once TEMPLATES . $this->template;
        } else {
            return require_once $this->content;
        }

    }

}
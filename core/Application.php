<?php

abstract class Application
{
    protected $request;
    protected $response;
    // protected $session;
    // protected $db_manager;

    public function __construct()
    {
        $this->initialize();
    }

    protected function initialize()
    {
        $this->request = new Request();
        $this->response = new Response();
        // $this->session = new Session();
        // $this->db_manager = new DbManager();
        $this->router = new Router($this->registerRoutes());
    }

    abstract public function getRootDir();

    abstract protected function registerRoutes();

    public function getRequest()
    {
        return $this->request;
    }

    public function getResponse()
    {
        return $this->response;
    }

    // public function getSession()
    // {
    //     return $this->session;
    // }

    // public function getDbManager()
    // {
    //     return $this->db_manager;
    // }

    public function getControllerDir()
    {
        return $this->getRootDir() . '/controllers';
    }

    public function getViewDir()
    {
        return $this->getRootDir() . '/views';
    }

    public function getModelDir()
    {
        return $this->getRootDir() . '/models';
    }

    public function getWebDir()
    {
        return $this->getRootDir() . '/web';
    }

    public function run()
    {
        $params = $this->router->resolve($this->request->getPathInfo());
        $controller = "Account"; // $params['controller'];
        $action = $params['action'];
        $this->runAction($controller, $action, $params);
        $this->response->send();
    }

    public function runAction($controller_name, $action, $params = array())
    {
        $controller_class = ucfirst($controller_name) . 'Controller';

        if ($this->findController($controller_class)) {

            // $controller = new $controller_class;
            // echo $controller;
        }
        $controller = new AccountController;
        // echo "xxxxxxxxxxx" . $controller;

        // if ($controller_class === false) {
        //     //to-do
        // }

        $content = $controller->run($action, $params);
echo "@@@@" . $content;
        $this->response->setContent($content);
    }

    protected function findController($controller_class)
    {
        if (!class_exists($controller_class)) {
            $controller_file = $this->getControllerDir() . '/' . $controller_class . '.php';
        }
        if (!is_readable($controller_file)) {
            return false;
        } else {
            require_once $controller_file;

            if (!class_exists($controller_class)) {
                return false;
            }
        }
        return true;
    }
}



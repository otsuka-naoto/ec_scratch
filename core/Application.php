<?php

abstract class Application
{
    protected $request;
    protected $response;
    protected $session;
    protected $db_manager;

    public function __construct()
    {
        $this->initialize();
    }

    protected function initialize()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->db_manager = new DbManager();
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

    public function getSession()
    {
        return $this->session;
    }

    public function getDbManager()
    {
        return $this->db_manager;
    }

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
        echo "5" . $params['controller'] . $params['action'];
        $controller = $params['controller'];
        $action = $params['action'];
        $this->runAction($controller, $action, $params);
        // $this->response->send();
    }

    public function runAction($controller_name, $action, $params = array())
    {
        $controller_class = ucfirst($controller_name) . 'Controller';
        echo "6" . $controller_class;
        echo "fix0";
        $controller = $this->findController($controller_class);
        echo "fix";
        $content = $controller->run($action, $params);
        // $this->response->setContent($content);
    }

    protected function findController($controller_class)
    {
        if (!class_exists($controller_class)) {
            $controller_file = $this->getControllerDir() . '/' . $controller_class . '.php';
        }
        if(!is_readable($controller_file)){
            return false;
        }
        echo "7" . $controller_file;
        require_once $controller_file;
        if (!class_exists($controller_class)) {
            return false;
        }

        return new $controller_class($this);
    }
}

<?php

abstract class Controller
{
    protected $controller_name;
    protected $action_name;
    protected $application;
    protected $request;
    protected $response;
    // protected $session;
    // protected $db_manager;

//    public function __construct($application)
    public function __construct()
    {
        echo "####";
        // echo $application;
        // $this->$application=$application;
        // echo "?2???";
        // $this->$application->getRequest();
        // echo "?3???";
        // $this->$application->getResponse();
        // echo "?4???";
        // $this->$application->getSession();
        // $this->$application->getDbManager();
    }

    public function run($action, $params = array())
    {
        echo "1;;;;";
        $this->controller_name = strtolower(substr(get_class($this), 0, -10));
        echo "2;;;;";
        $this->action_name = $action;
        echo "3;;;;";
        $action_method = $action . 'Action';
        echo "4;;;;";
        // $content = $this->$action_method($params);
        $content = $this->$action_method;
        echo "5;;;;" . $content;
        return $content;
    }

    public function render($variables = array(), $template = null, $layout = 'layout')
    {
        $defaults = array(
            'request' => $this->request,
            'base_url' => $this->request->getBaseUrl(),
            // 'session' => $this->session,
        );

        $view = new View($this->application->getViewDir(), $defaults);

        $path = $this->controller_name . '/' . $template;
        return $view->render($path, $variables, $layout);
    }


    protected function redirect($url)
    {
        if (!preg_match('https?:/', $url)) {
            $protocol = $this->request->isSsl() ? 'https://' : 'http://';
            $host = $this->request->getHost();
            $base_url = $this->request->getBaseUrl();
            $url = $protocol . $host . $url;
        }

        $this->response->setHttpHeader('location', $url);
    }
}

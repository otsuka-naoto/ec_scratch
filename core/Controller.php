<?php

abstract class Controller
{
    protected $controller_name;
    protected $action_name;
    protected $application;
    protected $request;
    protected $response;
    protected $session;
    protected $db_manager;

    public function __construct($application)
    {
        $this->$application;
        $this->$application->getRequest();
        $this->$application->getResponse();
        $this->$application->getSession();
        $this->$application->getDbManager();
    }

    public function run($action, $params = array())
    {
        $this->controller_name = strtolower(substr(get_class($this), 0, -10));
        $this->action_name = $action;
        $action_method = $action . 'Action';
        $content = $this->$action_method($params);
        return $content;
    }

    public function render($variables = array(), $template = null, $layout = 'layout')
    {
        $defaults = array(
            'request' => $this->request,
            'base_url' => $this->request->getBaseUrl(),
            'session' => $this->session,
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

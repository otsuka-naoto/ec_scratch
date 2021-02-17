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
        $this->controller_name = strtolower(substr(get_class($this), 0, 10));
        $this->application = $application;
        $this->request = $application->getRequest();
        $this->response = $application->getResponse();
        $this->session = $application->getSession();
        $this->application = $application->getDbManager();
    }

    public function run($action, $params = array())
    {
        $this->controller_name = strtolower(substr(get_class($this), 0, -10));
        $this->action_name = $action;
        $action_method = $action . 'Action';

        if (!method_exists($this, $action_method)) {
            //to-do
        }

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

        //to-do 取得できない
        //  $obj = $this->application->getViewDir();
        $obj = new EcScratchApplication;
        $view = new View($obj->getViewDir(), $defaults);

        if (is_null($template)) {
            $template = $this->action_name;
        }

        $path = $this->controller_name . '/' . $template;

        return $view->render($path, $variables, $layout);
    }

    protected function redirect($url)
    {
        if (!preg_match('https?:/', $url)) {
            $protocol = $this->request->isSsl() ? 'https://' : 'http://';
            $host = $this->request->getHost();
            $base_url = $this->request->getBaseUrl();
            $url = $protocol . $host . $base_url . $url;
        }

        $this->response->setHttpHeader('Location', $url);
    }
}

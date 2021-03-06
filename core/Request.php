<?php

class Request
{

    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }

        return false;
    }

    public function isGet($name, $default = null)
    {
        if (isset($_GET[$name])) {
            return $_GET[$name];
        }

        return $default;
    }

    public function getPost($name, $default = null)
    {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }

        return $default;
    }

    public function getHost()
    {
        if (!empty($_SERVER['HTTP_HOST'])) {
            return $_SERVER['HTTP_HOST'];
        }

        return $_SERVER['SERVER_NAME'];
    }

    public function isSsl()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            return true;
        }

        return false;
    }

    // URIフルパスを返す
    public function getReqestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    // スクリプト名を返す
    public function getBaseURL()
    {
        // スーパーグローバル変数からスクリプト名とリクエストURIを取得
        $script_name = $_SERVER['SCRIPT_NAME'];
        $reqest_uri = $this->getReqestUri();

        // リクエスURIを使ってスクリプト名からディレクトリを省く
        if (0 === strpos($reqest_uri, $script_name)) {
            return $script_name;
        } else if (0 === strpos($reqest_uri, dirname($script_name))) {
            return rtrim(dirname($script_name), '/');
        }
        return '';
    }

    // リクエストURIから?を除いて返す
    public function getPathInfo()
    {
        $base_url = $this->getBaseURL();
        $reqest_uri = $this->getReqestUri();

        if (false !== ($pos = strpos($reqest_uri, '?'))) {
            $reqest_uri = substr($reqest_uri, 0, $pos);
        }

        $path_info = (string)substr($reqest_uri, strlen($base_url));

        return $path_info;
    }
}

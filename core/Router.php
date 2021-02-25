<?php

class Router
{
    protected $routes;

    public function __construct($definitions)
    {
        $this->routes = $this->compileRoutes($definitions);
    }

    public function compileRoutes($definitions)
    {
        $routes = array();

        foreach ($definitions as $url => $params) {
            $tokens = explode('/', ltrim($url, '/'));

            foreach ($tokens as $i => $token) {
                if (0 === strpos($token, ':')) {
                    $name = substr($token, 1);
                    $token = '(?P<' . $name . '>[^/]+)';
                }
                $tokens[$i] = $token;
            }

            $pattern = '/' . implode('/', $tokens);
            $routes[$pattern] = $params;
        }

        return $routes;
    }

    public function resolve($path_info)
    {
        // URIの先頭に/をつける
        if ('/' !== substr($path_info, 0, 1)) {
            $path_info = '/' . $path_info;
        }

        // 配列 $this->routes をキー $pattern でパラメーター $params を順番に取得する
        // $pattern にパス、$params は配列
        foreach ($this->routes as $pattern => $params) {

            // リクエストパスにマッチした $params の配列を返す
            if (preg_match('#^' . $pattern . '$#', $path_info, $matches)) {
                $params = array_merge($params, $matches);
                return $params;
            }
        }
        return false;
    }
}

<?php

class Router {

    private $routes;

    public function __construct() {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    public function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() {
        $uri = $this->getURI();
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $parameters = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($parameters) . 'Controller');
                $actionName = 'action' . ucfirst(array_shift($parameters));
                $controllerFile = ROOT . "/controllers/" . $controllerName . ".php";

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                    $controllerObj = new $controllerName;
                    $result = call_user_func_array(array($controllerObj, $actionName), $parameters);
                    if ($result != null) {
                        break;
                    }
                }
            }
        }
    }

}

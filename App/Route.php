<?php

namespace App;

class Route
{
    private $routes;

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    protected function initRoutes()
    {
        $this->routes = array(
            array(
                'route' => '/',
                'controller' => 'Index',
                'action' => 'index'
            ),
            array(
                'route' => '/start',
                'controller' => 'Game',
                'action' => 'start'
            ),
            array(
                'route' => '/destroy',
                'controller' => 'Game',
                'action' => 'destroy'
            ),
            array(
                'route' => '/answer',
                'controller' => 'Game',
                'action' => 'answer'
            ),
            array(
                'route' => '/level',
                'controller' => 'Game',
                'action' => 'level'
            ),
        );
    }

    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    protected function run($url)
    {
        foreach ($this->routes as $route) {
            if ($url == $route['route']) {
                $controllerName = "App\\Controllers\\" . ucfirst($route['controller']) . "Controller";
                $actionName = $route['action'];

                if (class_exists($controllerName)) {
                    $controller = new $controllerName();

                    if (method_exists($controller, $actionName)) {
                        $controller->$actionName();
                        return;
                    } else {
                        throw new \Exception("Action '$actionName' not found in controller '$controllerName'");
                    }
                } else {
                    throw new \Exception("Controller '$controllerName' not found");
                }
            }
        }

        // Rota padrão caso nenhuma rota correspondente seja encontrada.
        $defaultController = "App\\Controllers\\IndexController";
        $defaultAction = 'index';

        if (class_exists($defaultController) && method_exists($defaultController, $defaultAction)) {
            $controller = new $defaultController();
            $controller->$defaultAction();
        } else {
            echo "404 - Rota não encontrada";
        }
    }
}

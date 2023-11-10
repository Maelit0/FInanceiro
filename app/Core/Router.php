<?php

namespace App\Core;

use Routes\RouteSwitch;

class Router extends RouteSwitch
{
    public function run(string $requestUri)
    {
        $route = substr($requestUri, 1);
        $route = explode("/", $route);
        $route = $route[0];
        $data = json_decode(file_get_contents('php://input'), true);

        if (empty($route) || !method_exists($this, $route)) {
            throw new RouteException($route);
        }
        return $this->$route($data);
    }
}

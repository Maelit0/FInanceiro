<?php

namespace App\Core;

class RouteException extends \Exception
{
    public function __construct($route)
    {
        $message = "A rota '{$route}' não foi encontrada!";
        parent::__construct($message);
    }
}

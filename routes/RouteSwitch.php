<?php

namespace Routes;

use App\Controller\HomeController;
use App\Controller\ProdutoController;
use App\Token\JwtValidator;
use App\Token\TokenValidator;
use Exception;

abstract class RouteSwitch
{
    public $requestMethod;
    public $uri;

    public function __construct()
    {
        $this->requestMethod = $_SERVER["REQUEST_METHOD"];
        $url = explode("/", $_SERVER["REQUEST_URI"]);
        $this->uri = $url[2] ?? "";
    }

    protected function home()
    {
        $home = new HomeController();

        if ($this->requestMethod == "GET" && !empty($this->uri)) {
            return $home->show($this->uri);
        }

        if ($this->requestMethod == "GET") {
            return $home->index();
        }

        if ($this->requestMethod == "POST") {
            return $home->store($_POST);
        }

        if ($this->requestMethod == "PUT") {
            return $home->update($this->uri, $_POST);
        }

        if ($this->requestMethod == "DELETE") {
            return $home->destroy($this->uri);
        }
    }

    protected function movimentacao()
    {
       
        $movimentacao = new HomeController();

        if ($this->requestMethod == "GET" && !empty($this->uri)) {
            return $movimentacao->show($this->uri);
        }

        if ($this->requestMethod == "GET") {
            return $movimentacao->index();
        }

        if ($this->requestMethod == "POST") {
            return $movimentacao->store($_POST);
        }

        if ($this->requestMethod == "PUT") {
            return $movimentacao->update($this->uri, $_POST);
        }

        if ($this->requestMethod == "DELETE") {
            return $movimentacao->destroy($this->uri);
        }
    }

    protected function produto()
    {
        $cliente = new ProdutoController();

        $middleware = new TokenValidator();

        $verificacao =  $middleware->verify();

        if (!$verificacao) {
            throw new Exception("Token Inválido ou não fornecido");
        }

        if ($this->requestMethod == "GET" && !empty($this->uri)) {
            return $cliente->show($this->uri);
        }

        if ($this->requestMethod == "GET") {
            return $cliente->index();
        }

        if ($this->requestMethod == "POST") {
            return $cliente->store($_POST);
        }

        if ($this->requestMethod == "PUT") {
            return $cliente->update($this->uri, $_POST);
        }

        if ($this->requestMethod == "DELETE") {
            return $cliente->destroy($this->uri);
        }
    }

    protected function  historico()
    {

        $historico = new ProdutoController();

        $middleware = new TokenValidator();

        $verificacao =  $middleware->verify();

        if (!$verificacao) {
            throw new Exception("Token Inválido ou não fornecido");
        }

        if ($this->requestMethod == "GET" && !empty($this->uri)) {
            return $historico->show($this->uri);
        }

        if ($this->requestMethod == "GET") {
            return $historico->index();
        }

        if ($this->requestMethod == "POST") {
            return $historico->store($_POST);
        }

        if ($this->requestMethod == "PUT") {
            return $historico->update($this->uri, $_POST);
        }

        if ($this->requestMethod == "DELETE") {
            return $historico->destroy($this->uri);
        }
    }
}

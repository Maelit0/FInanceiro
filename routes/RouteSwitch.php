<?php

namespace Routes;

use App\Controller\HistoricoController;
use App\Controller\HomeController;
use App\Controller\MovimentacaoController;
use App\Controller\ProdutoController;
use App\Controller\ServicoController;
use App\Token\JwtValidator;
use App\Token\TokenValidator;
use Exception;

abstract class RouteSwitch
{
    public $requestMethod;
    public $uri;
    public $requestBody;


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
            print json_encode($home->show($this->uri));
            return;
        }

        if ($this->requestMethod == "GET") {
            print json_encode($home->index());
            return;
        }

        if ($this->requestMethod == "POST") {
            print json_encode($home->store($_POST));
            return;
        }

        if ($this->requestMethod == "PUT") {
            print json_encode($home->update($this->uri, $_POST));
            return;
        }

        if ($this->requestMethod == "DELETE") {
            print json_encode($home->destroy($this->uri));
            return;
        }
    }

    protected function movimentacao()
    {
        $requestBody = json_decode(file_get_contents('php://input'), true);
        $movimentacao = new MovimentacaoController();

        if ($this->requestMethod == "GET" && !empty($this->uri)) {
            print json_encode($movimentacao->show($this->uri));
            return;
        }

        if ($this->requestMethod == "GET") {
            print json_encode($movimentacao->index());
            return;
        }

        if ($this->requestMethod == "POST") {
            print json_encode($movimentacao->store($requestBody));
            return;
        }

        if ($this->requestMethod == "PUT") {
            print json_encode($movimentacao->update($this->uri, $requestBody));
            return;
        }

        if ($this->requestMethod == "DELETE") {
            print json_encode($movimentacao->destroy($this->uri));
            return;
        }
    }

    protected function produtos()
    {
        $requestBody = json_decode(file_get_contents('php://input'), true);

        $produtos = new ProdutoController();

        if ($this->requestMethod == "GET" && !empty($this->uri)) {
            print json_encode($produtos->show($this->uri));
            return;
        }

        if ($this->requestMethod == "GET") {
            print json_encode($produtos->index());
            return;
        }

        if ($this->requestMethod == "POST") {
            print json_encode($produtos->store($requestBody));
            return;
        }

        if ($this->requestMethod == "PUT") {
            print json_encode($produtos->update($this->uri, $_POST));
            return;
        }

        if ($this->requestMethod == "DELETE") {
            print json_encode($produtos->destroy($this->uri));
            return;
        }
    }
    protected function servicos()
    {
        $requestBody = json_decode(file_get_contents('php://input'), true);

        $servicos = new ServicoController();

        if ($this->requestMethod == "GET" && !empty($this->uri)) {
            print json_encode($servicos->show($this->uri));
            return;
        }

        if ($this->requestMethod == "GET") {
            print json_encode($servicos->index());
            return;
        }

        if ($this->requestMethod == "POST") {
            print json_encode($servicos->store($requestBody));
            return;
        }

        if ($this->requestMethod == "PUT") {
            print json_encode($servicos->update($this->uri, $requestBody));
            return;
        }

        if ($this->requestMethod == "DELETE") {
            print json_encode($servicos->destroy($this->uri));
            return;
        }
    }
    protected function  historico()
    {

        $requestBody = json_decode(file_get_contents('php://input'), true);

        $historico = new HistoricoController();

        if ($this->requestMethod == "GET" && !empty($this->uri)) {
            print json_encode($historico->show($this->uri));
            return;
        }

        if ($this->requestMethod == "GET") {
            print json_encode($historico->index());
            return;
        }

        if ($this->requestMethod == "POST") {
            print json_encode($historico->store($_POST));
            return;
        }

        if ($this->requestMethod == "PUT") {
            print json_encode($historico->update($this->uri, $requestBody));
            return;
        }

        if ($this->requestMethod == "DELETE") {
            print json_encode($historico->destroy($this->uri));
            return;
        }
    }
}

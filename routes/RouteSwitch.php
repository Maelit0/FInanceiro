<?php

namespace Routes;

use App\Controller\HistoricoController;
use App\Controller\HomeController;
use App\Controller\MovimentacaoController;
use App\Controller\ProdutoController;
use App\Controller\ServicoController;
use App\Core\NullException;
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
    protected function  getClientes()
    {
        $totalClientes = new HomeController();
        print json_encode($totalClientes->getAllClients());
        return;
    }
    protected function  getEntrada(): void
    {
        $entrada = new HomeController();
        print json_encode($entrada->getALlEntradas());
        return;
    }
    protected function  getSaida()
    {
        $saida = new HomeController();
        print json_encode($saida->getAllSaidas());
        return;
    }
    protected function  getProdutos()
    {
       $produtos = new HomeController();
       print json_encode($produtos->getAllProdutos());
       return;
    }
    protected function movimentacao()
    {
        $movimentacao = new MovimentacaoController();

        $requestBody = json_decode(file_get_contents('php://input'), true);

        $requiredFields = ['descricao', 'id_cliente', 'tipo', 'valor'];
        foreach ($requiredFields as $field) {
            if (empty($requestBody[$field])) {
                throw new NullException($this->requestMethod);
            }
        }
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
        $requiredFields = ['quant_estoque', 'preco_de_venda', 'preco_de_compra', 'codigo_de_barras', 'descricao', 'nome', 'data_criacao', 'data_modificacao'];
        foreach ($requiredFields as $field) {
            if (empty($requestBody[$field])) {
                throw new NullException($this->requestMethod);
            }
        }
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
            print json_encode($produtos->update($this->uri, $requestBody));
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

        $requiredFields = ['descricao', 'id_cliente', 'tipo', 'valor'];
        foreach ($requiredFields as $field) {
            if (empty($requestBody[$field])) {
                throw new NullException($this->requestMethod);
            }
        }
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
        // $requiredFields = ['quant_estoque', 'preco_de_venda', 'preco_de_compra', 'codigo_de_barras', 'descricao', 'nome', 'data_criacao', 'data_modificacao'];
        // foreach ($requiredFields as $field) {
        //     if (empty($requestBody[$field])) {
        //         throw new NullException($this->requestMethod);
        //     }
        // }
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
            print json_encode($historico->store($requestBody));
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

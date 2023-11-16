<?php

namespace App\Model;

use App\Library\Select;

class HomeModel
{
    public function getAll()
    {
        $home = new Select();
        return $home->select('movimentacao', ['*']);
    }
    public function  getCliente()
    {
        $cliente = new Select();
        return $cliente->select('clientes', ['nome']);
    }
    public function  getTotalClientes()
    {
        $select = new Select();
        return $select->select('clientes', ['count(*)']);
    }
    public function getProdutos()
    {
        $produtos = new Select();
        return $produtos->select('produtos', ['quant_estoque']);
    }
    public function  getTotalProdutos()
    {
        $select = new Select();
        return $select->select('produtos', ['count(*)']);
    }
    public function  getEntrada()
    {
        $entrada = new Select();
        return $entrada->select('vendas', ['sum (valor_venda)']);
    }
    public function  getTotalEntradas()
    {
        $select = new Select();
        return $select->select('vendas', ['count(*)']);
    }
    public function getSaida()
    {
        $saida = new Select();
        return $saida->select('contas_a_pagar', ['valor']);
    }
    public function  getTotalSaidas()
    {
        $select = new Select();
        return $select->select('contas_a_pagar', ['sum(valor)']);
    }
    public function selectOne($id)
    {
        $pegarUm = new Select();
        return $pegarUm->select('movimentacao', ['*'], ["id = " . "'{$id}'"]);
    }
}

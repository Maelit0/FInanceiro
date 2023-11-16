<?php

namespace App\Controller;

use App\Model\HomeModel;
use App\Token\CreateToken;

class HomeController extends HomeModel
{

    public function index()
    {
        $token = new CreateToken;
        return $this->getAll();
    }
    public function show($id)
    {
        return $this->selectOne($id);
    }
    public function store($params)
    {
    }
    public function update($id, $params)
    {
    }
    public function  getAllCLients()
    {
        return $this->getTotalClientes();
    }
    public function  getALlEntradas()
    {
          return $this->getTotalEntradas();
    }
    public function  getAllSaidas()
    {
        return $this->getTotalSaidas();
    }
    public function  getAllProdutos()
    {
        return $this->getTotalClientes();
    }
    public function destroy($id)
    {
    }
}

<?php

namespace App\Controller;

use App\Model\ProdutoModel;

class ProdutoController extends ProdutoModel
{

    public function index()
    {
        return $this->getAll();
    }
    public function  store($params)
    {
        return $this->insert($params);
    }
    public function  show($id)
    {
        return $this->selectOne($id);
    }
    public function  update($id, $params)
    {
        return $this->update('produtos', $id, $params);
    }
    public function  destroy($id)
    {
        return $this->deletar($id,'produtos');
    }
}

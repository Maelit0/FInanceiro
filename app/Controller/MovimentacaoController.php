<?php

namespace App\Controller;

use App\Model\MovimentacaoModel;

class MovimentacaoController extends MovimentacaoModel
{
    public function  index()
    {
        return $this->getAll();
    }
    public function store($params)
    {
        return $this->insert($params);
    }
    public function show($id)
    {
        return $this->selectOne($id);
    }
    public function update($id, $params)
    {
        return $this->update('movimentacao', $params . $id);
    }
    public function destroy($id)
    {
        return $this->deletar($id, 'movimentacao');
    }
}

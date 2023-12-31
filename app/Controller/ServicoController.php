<?php

namespace App\Controller;

use App\Model\ServicoModel;

class ServicoController extends ServicoModel
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
        return $this->getOne($id);
    }
    public function update($id, $params)
    {
        return $this->atualizar($params, $id);
    }
    public function destroy($id)
    {
        return $this->deletar($id);
    }
}

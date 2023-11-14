<?php

namespace App\Model;

use App\Library\Delete;
use App\Library\Insert;
use App\Library\Select;
use App\Library\Update;

class ServicoModel
{
    public function  getAll()
    {
        $servico = new Select();
        return $servico->select('servicos', ['*']);
    }
    public function  insert($arrValues)
    {
        $salvar = new Insert();
        return $salvar->insert('servicos', $arrValues);
    }
    public function  atualizar($params,$id)
    {
        $update = new Update();
        return $update->update('servicos', $params, "id = $id");
    }
    public function  getOne($id)
    {
        $pegarUm = new Select();
        return $pegarUm->select('servicos', ['*'], ["id = $id"]);
    }
    public function  deletar($params)
    {
        $deletar = new Delete();
        return $deletar->delete('servicos',$params);
    }
}

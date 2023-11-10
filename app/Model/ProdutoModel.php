<?php

namespace App\Model;

use App\Library\Delete;
use App\Library\Insert;
use App\Library\Select;
use App\Library\Update;

class ProdutoModel
{

    public function getAll()
    {
        $select = new Select();
        return $select->select('produtos', ['*']);
    }
    public function  insert($arrValues)
    {
        $salvar = new Insert();
        return $salvar->insert('produtos',$arrValues);
    }
    public function  atualizar($id,$params)
    {
        $update = new Update();
        return $update->update('produtos',$params, "id = $id");
    }
    public function  selectOne($id)
    {
        $pegarUm = new Select();
        return $pegarUm->select('produtos',['*'],["id =$id"]);
    }
    public function  deletar($params)
    {
        $deletar = new Delete();
        return $deletar->delete('produtos',$params);
    }
}

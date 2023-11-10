<?php

namespace App\Model;

use App\Library\Delete;
use App\Library\Insert;
use App\Library\Select;
use App\Library\Update;

class MovimentacaoModel
{
    public function  getAll()
    {
        $movimentacao = new Select();
        return $movimentacao->select('movimentacao', ['*']);
    }
    public function  insert($arrValues)
    {
        $inserir = new Insert();
        return $inserir ->insert('movimentacao',$arrValues);
    }
    public function  atualizar($id,$params)
    {
        $update = new Update();
        return $update->update('movimentacao',$params,$id);
    }
    public function  deletar($params)
    {
        $deletar = new Delete();
        return $deletar->delete('movimentacao',$params);
    }
}

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

    public function selectOne($id)
    {
        $pegarUm = new Select();
        return $pegarUm->select('movimentacao', ['*'], ["id = " . "'{$id}'"]);
    }
}

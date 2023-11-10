<?php

namespace App\Model;

use App\Library\Select;

class HomeModel
{
    public function getAll()
    {
        $home = new Select();
        return $home->select('movimentacoes',['*']);
    }
}

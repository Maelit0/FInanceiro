<?php

namespace App\Model;

use App\Library\Select;
use stdClass;

class HistoricoModel
{
    public function  getRelatorio()
    {
        $select = new Select();
        $relatorio = new stdClass();
        $relatorio->produtos = $select->select('produtos', ['*']);
        $relatorio->servicos = $select->select('servicos', ['*']);
        return $relatorio;
    }
}

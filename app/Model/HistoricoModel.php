<?php

use App\Library\Select;

class HistoricoModel
{
    public function  getRelatorio()
    {
        $select = new Select();
        $relatorio = new stdClass();
        $relatorio->produtos = $select->select('produtos');
        $relatorio->servicos = $select->select('servicos');
        return $relatorio;
    }
}

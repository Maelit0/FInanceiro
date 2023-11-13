<?php

namespace App\Controller;

use HistoricoModel;

class HistoricoController extends HistoricoModel
{

    public function index()
    {
        return $this->getRelatorio();
    }
}

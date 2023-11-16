<?php

namespace App\Controller;

use App\Model\HistoricoModel;

class HistoricoController extends HistoricoModel
{

    public function index()
    {
        return $this->getRelatorio();
    }
    public function  show($id)
    {
    }
    public function  store($params)
    {
    }
    public function  update($id,$params)
    {
    }
    public function  destroy($id)
    {
    }
}

<?php

namespace App\Controller;

use App\Model\HomeModel;

class HomeController extends HomeModel
{
    public function index()
    {
        return $this->getAll();
    }
    public function show($id)
    {
        return $this->selectOne($id);
    }
    public function store($params)
    {
    }
    public function update($id, $params)
    {
    }
    public function destroy($id)
    {
    }
}

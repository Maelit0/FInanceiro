<?php

namespace App\Controller;

use App\Model\HomeModel;

class HomeController extends HomeModel
{
    public function index()
    {
        return $this->getAll();
    }
    public function store($params)
    {
    }

    public function show($id)
    {
    }

    public function update($id, $params)
    {
    }

    public function destroy($id)
    {
    }
}

<?php

namespace App\Library;

use PDO;

class Connection
{
    public $db;
    public function __construct()
    {
        $this->db = new PDO("pgsql:host=localhost;port=5432;dbname=bancoprojeto;user=ismael;password=ismael123");
    }
}

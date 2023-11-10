<?php

namespace App\Library;


class Insert extends Connection
{
    public function insert(string $table, array $arrValues)
    {
        $columns = implode(',', array_keys($arrValues));
        $values = implode(',', array_fill(0, count($arrValues), '?'));

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array_values($arrValues));
    }
}
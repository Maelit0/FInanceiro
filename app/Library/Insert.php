<?php

namespace App\Library;

class Insert extends Connection
{
    public function insert(string $table, array $arrValues)
    {
       
        $columns = implode(',', array_keys($arrValues));
        $values = $this->formatValuesForSql($arrValues);
        $placeholders = implode(',', array_fill(0, count($arrValues), '?'));

        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array_values($arrValues));
    }

    private function formatValuesForSql(array $arrValues): string
    {
        $formattedValues = array_map(function ($value) {
            return "'" . $value . "'";
        }, $arrValues);

        return implode(',', $formattedValues);
    }
}

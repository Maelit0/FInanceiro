<?php

namespace App\Library;

class Update extends Connection
{

    public function update($table, $data, $conditions)
    {
        $updateColumns = [];
        foreach ($data as $column => $value) {
            $updateColumns[] = "$column = :$column";
        }

        $updateValues = [];
        foreach ($conditions as $column => $value) {
            $updateValues[] = "$column = :condition_$column";
        }

        $sql = "UPDATE $table SET " . implode(", ", $updateColumns) . " WHERE " . implode(" AND ", $updateValues);

        $stmt = $this->db->prepare($sql);

        foreach ($data as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }

        foreach ($conditions as $column => $value) {
            $stmt->bindValue(":condition_$column", $value);
        }

        return $stmt->execute();
    }
}

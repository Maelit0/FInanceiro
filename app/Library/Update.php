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

        $sql = "UPDATE $table SET " . implode(", ", $updateColumns) . " WHERE " . $conditions;

        $stmt = $this->db->prepare($sql);

        foreach ($data as $column => $value) {
            $stmt->bindValue(":$column", "$value");
        }

        return $stmt->execute();
    }
}

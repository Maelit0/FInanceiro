<?php

namespace App\Library;

class Delete extends Connection
{
   
    public function delete($table, $conditions)
    {
        $deleteValues = [];
        foreach ($conditions as $column => $value) {
            $deleteValues[] = "$column = :condition_$column";
        }

        $sql = "DELETE FROM $table WHERE " . implode(" AND ", $deleteValues);

        $stmt = $this->db->prepare($sql);

        foreach ($conditions as $column => $value) {
            $stmt->bindValue(":condition_$column", $value);
        }

        return $stmt->execute();
    }
}

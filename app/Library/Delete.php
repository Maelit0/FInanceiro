<?php

namespace App\Library;

class Delete extends Connection
{
    public function delete($table, $conditions)
    {
        $sql = "DELETE FROM $table WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $conditions);

        return $stmt->execute();
    }
}

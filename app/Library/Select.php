<?php

namespace App\Library;

use PDO;

class Select extends Connection
{

    public function select($table, $columns = ['*'], $conditions = [], $orderBy = null, $limit = null)
    {
        $sql = "SELECT " . implode(", ", $columns) . " FROM $table";

        if (!empty($conditions)) {
            $whereClauses = [];
            foreach ($conditions as $column => $value) {
                $whereClauses[] = "$value";
            }
            $sql .= " WHERE " . implode(" AND ", $whereClauses);
        }

        if ($orderBy) {
            $sql .= " ORDER BY $orderBy";
        }

        if ($limit !== null) {
            $sql .= " LIMIT $limit";
        }

        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
}

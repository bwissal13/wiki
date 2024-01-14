<?php
namespace App\Models;
use App\Model;
use PDOException;
class WikiModel extends Model{
    public function recordExists($table, $conditions)
    {
        try {
            $whereClause = '';
            $params = [];

            foreach ($conditions as $column => $value) {
                $whereClause .= "$column = :$column AND ";
                $params[":$column"] = $value;
            }

            $whereClause = rtrim($whereClause, ' AND ');

            $stmt = $this->connection->prepare("SELECT COUNT(*) FROM $table WHERE $whereClause");
            $stmt->execute($params);

            $count = $stmt->fetchColumn();

            return $count > 0;
        } catch (PDOException $e) {
            // Handle the exception (log, throw, etc.)
            return false;
        }
    }

    // ...
}

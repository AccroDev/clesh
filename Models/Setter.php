<?php
namespace Models;

use PDOException;

class Setter
{ 
    /**
     * Insère des données dans une table
     *
     * @param string $table
     * @param array $data  ['colonne' => 'valeur']
     * @return bool
     */
    public static function insert(string $table, array $data): bool
    {
        try {
            $bdd = GetPdo::getpdo();

            // Colonnes
            $columns = array_keys($data);
            $fields = implode(', ', $columns);

            // Placeholders
            $placeholders = ':' . implode(', :', $columns);

            $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$placeholders})";

            $stmt = $bdd->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            return $stmt->execute();

        } catch (PDOException $e) {
            var_dump($e->getMessage());exit;
            // Log possible ici
            return false;
        }
    }
}

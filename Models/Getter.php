<?php
namespace Models;

use PDO;
use PDOException;

class Getter
{
     
     /**
     * Récupère des données depuis une table
     *
     * @param string $table
     * @param array $conditions ['colonne' => 'valeur']
     * @param bool $fetchAll true = fetchAll | false = fetch
     * @param string $fields champs à récupérer
     * @return array|null
     */
    public static function get(
        string $table,
        array $conditions = [],
        bool $fetchAll = false,
        string $fields = '*'
    ): ?array {
        try {
            $bdd = GetPdo::getpdo();

            $sql = "SELECT {$fields} FROM {$table}";

            // Conditions
            if (!empty($conditions)) {
                $where = [];
                foreach ($conditions as $key => $value) {
                    $where[] = "{$key} = :{$key}";
                }
                $sql .= ' WHERE ' . implode(' AND ', $where);
            }

            $stmt = $bdd->prepare($sql);

            // Bind conditions
            foreach ($conditions as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();

            return $fetchAll
                ? $stmt->fetchAll(PDO::FETCH_ASSOC)
                : $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return null;
        }
    }
}

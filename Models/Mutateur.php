<?php
namespace Models;

use PDOException;

class Mutateur
{
    /**
     * Met à jour des données dans une table
     *
     * @param string $table Nom de la table
     * @param array $data ['colonne' => 'nouvelle_valeur']
     * @param array $where ['colonne_filtre' => 'valeur_filtre']
     * @return bool
     */
    public static function update(string $table, array $data, array $where): bool
    {
        try {
            $bdd = GetPdo::getpdo();

            // Construction de la partie SET (ex: titre = :titre, contenue = :contenue)
            $setParts = [];
            foreach ($data as $key => $value) {
                $setParts[] = "{$key} = :{$key}";
            }
            $setString = implode(', ', $setParts);

            // Construction de la partie WHERE (ex: id = :w_id)
            $whereParts = [];
            foreach ($where as $key => $value) {
                $whereParts[] = "{$key} = :w_{$key}";
            }
            $whereString = implode(' AND ', $whereParts);

            $sql = "UPDATE {$table} SET {$setString} WHERE {$whereString}";

            $stmt = $bdd->prepare($sql);

            // Bind des valeurs du SET
            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            // Bind des valeurs du WHERE
            foreach ($where as $key => $value) {
                $stmt->bindValue(':w_' . $key, $value);
            }

            return $stmt->execute();

        } catch (PDOException $e) {
            error_log("Erreur Mutateur: " . $e->getMessage());
            return false;
        }
    }
}
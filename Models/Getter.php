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
     * @return array|false
     */
    public static function get(
        string $table,
        array $conditions = [],
        bool $fetchAll = false,
        string $fields = '*'
    ) {
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
            return false;
        }
    }

    public static function getCart($cartId)
    { 
        $db = GetPdo::getpdo();  
        $stmt = $db->prepare("
            SELECT 
                ci.product_id, 
                ci.quantite, 
                ci.prix_unitaire, 
                p.nom, 
                p.categorie, 
                p.image, 
                p.description,
                (ci.quantite * ci.prix_unitaire) as sous_total
            FROM cart_items ci
            JOIN produits p ON ci.product_id = p.id
            WHERE ci.cart_id = :cart_id");
        $stmt->execute([":cart_id" => $cartId]); 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } 
    public static function calculateNewTotal($cartId) {
        $bdd = GetPdo::getpdo();
        $rq = $bdd->prepare("SELECT SUM(quantite * prix_unitaire) as total FROM cart_items WHERE cart_id = :id");
        $rq->execute([':id' => $cartId]);
        $result = $rq->fetch(PDO::FETCH_ASSOC); 
        return $result['total'] ?? 0;
    }
}

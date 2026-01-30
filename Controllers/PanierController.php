<?php

namespace Controllers;

use Models\Getter;
use Models\Mutateur;
use Models\Setter;

class PanierController{

    public function addInCart()
    { 
        $productId = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT) ?? filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
        $userId = $_SESSION["user"]['id'] ?? null;  

        if (!$productId) { 
            ProductController::redirectWithError("Produit invalide.");
        }

        // 2. Trouver ou Créer le panier actif
        // On cherche un panier 'active' pour cet utilisateur
        $cart = Getter::get("carts", [
            "user_id" => $userId,
            "status" => "active"
        ]);

        if (!$cart) {
            // Création d'un nouveau panier si aucun n'est actif
            $cartId = Setter::insert("carts", [
                "user_id" => $userId,
                "status" => "active",
                "devise" => "$" 
            ]);
        } else {
            $cartId = $cart['id'];
        }

        // 3. Vérifier si le produit est déjà dans le panier
        $existingItem = Getter::get("cart_items", [
            "cart_id" => $cartId,
            "product_id" => $productId
        ]);

        if ($existingItem) { 
            $newQty = $existingItem['quantite'] + 1; 
            Mutateur::update("cart_items", ["quantite" => $newQty], ["id" => $existingItem['id']]);
        } else { 
            $product = Getter::get("produits", ["id" => $productId],false,'prix'); 
            Setter::insert("cart_items", [
                "cart_id" => $cartId,
                "product_id" => $productId,
                "quantite" => 1,
                "prix_unitaire" => $product['prix']
            ]);
        } 
        header("Location: ".explode("?",$_SERVER['HTTP_REFERER'])[0] ."?success=true");
        exit();
    }

    public static function getCartDetails($cartId = null)
    { 
        if (!isset($cartId) || $cartId === null) {
            $userId = $_SESSION["user"]['id'] ?? null; 
            $activeCart = Getter::get("carts", ["user_id" => $userId, "status" => "active"]);
            if (!$activeCart) return null;
            
            $cartId = $activeCart['id'];
            $devise = $activeCart['devise'];
        } else {
            $cartInfo = Getter::get("carts", ["id" => $cartId]);
            if (!$cartInfo) return null;
            $devise = $cartInfo['devise'];
        } 

        $items = Getter::getCart($cartId);

        if (empty($items)) {
            return [
                "cart_id" => $cartId,
                "devise" => $devise,
                "total_amount" => 0,
                "items" => []
            ];
        }
 
        $totalAmount = array_sum(array_column($items, 'sous_total'));

        return [
            "cart_id"      => $cartId,
            "devise"       => $devise,
            "total_amount" => $totalAmount,
            "items"        => $items
        ];
    }

    public function update()
    { 
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $productId = $data['product_id'] ?? null;
        $newQty    = $data['quantity'] ?? null;
        $userId    = $_SESSION["user"]['id'] ?? null;

        if (!$productId || !$newQty) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Données manquantes']);
            return;
        }
 
        $cart = Getter::get("carts", [
            "user_id" => $userId,
            "status"  => "active"
        ]);

        if (!$cart) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Panier introuvable']);
            return;
        }

        $cartId = $cart['id']; 
    
        try {
            Mutateur::update(
                "cart_items", 
                ['quantite'=> $newQty],
                [
                    'cart_id' => $cartId,
                    'product_id' => $productId
                ]);
 
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true, 
                'message' => 'Quantité mise à jour',
                'new_total' => Getter::calculateNewTotal($cartId)
            ]);

        } catch (\Exception $e) {
            header('Content-Type: application/json', true, 500);
            echo json_encode(['success' => false, 'message' => 'Erreur serveur']);
        }
    } 
}
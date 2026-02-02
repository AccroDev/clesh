<?php

namespace Controllers;

use Exception;
use Models\Getter;
use Models\Mutateur;
use Models\Setter;

class ProductController
{

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirectWithError("Requête invalide.");
            return;
        }

        // 1. Récupération des données
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        $categorie = filter_input(INPUT_POST, 'categori', FILTER_SANITIZE_SPECIAL_CHARS);
        $prix = filter_input(INPUT_POST, 'prix', FILTER_VALIDATE_FLOAT);
        $devise = filter_input(INPUT_POST, 'devise', FILTER_SANITIZE_SPECIAL_CHARS);
        $editItem = filter_input(INPUT_POST, 'editItem', FILTER_SANITIZE_SPECIAL_CHARS);
        // 2. Traitement de l'image
        $imagePath = 'default_product.jpg'; // Image par défaut
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $uploadDir = 'uploads/products/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('prod_') . '.' . $extension;
            $destination = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $imagePath = $destination;
            }
        }

        // 3. Validation
        if (!$nom || !$prix) {
            $this->redirectWithError("Le nom et le prix sont obligatoires.");
            return;
        }

        // 4. Préparation des données
        $data = [
            "nom"         => $nom,
            "description" => $description,
            "categorie"   => $categorie,
            "prix"        => $prix,
            "devise"      => $devise, 
            "created_at"  => date('Y-m-d H:i:s')
        ];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
           $data["image"] = $imagePath;
        }

        try {
            // Utilisation de ton Setter
            $result = isset($editItem) ? Mutateur::update("produits",$data,["id" => $editItem]) : Setter::insert("produits", $data);

            if ($result) {
                header("Location: /admin/product?success=1");
                exit();
            } else {
                $this->redirectWithError("Erreur lors de l'insertion.");
            }
        } catch (Exception $e) {
            $this->redirectWithError($e->getMessage());
        }
    }

    public static function listProducts()
    { 
        $products = Getter::get("produits",[],true);  
        return $products;
    }

    /**
     * Helper pour gérer les erreurs et redirection
     */
    public static function redirectWithError($message)
    {
        // On peut passer l'erreur en session ou en paramètre GET
        $_SESSION['error'] = $message;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }

    public function delete($name, $params)
    {
        $id = isset($params['id']) ? $params['id'] : null;
        if (!$id) {
            header("Location: /admin/product?error=id introuvable");
            return;
        }

        Mutateur::delete("produits",(int) $id);
        header('Location: /admin/product?success=true');
    }

}
 

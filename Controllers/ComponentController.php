<?php

namespace Controllers;

use Models\GetPdo;
use Models\Getter;
use Models\Setter;

class ComponentController {

    public function save() {
        // Récupérer les données du formulaire
        $name = $_POST['name'] ?? '';
        $title = $_POST['title'] ?? '';
        $category = $_POST['category'] ?? '';
        $fields_json = $_POST['fields_json'] ?? ''; 
 
        $stmt = Setter::insert('composant', [
            'name' => $name,
            'title' => $title,
            'category' => $category,
            'fields' =>$fields_json,
            "Auth" => $_SESSION["user"]['id'], 
        ]); 
        // Rediriger ou afficher un message de succès
        header('Location: /admin/components/add?success='. ($stmt ? 'true' : 'false')); 
        exit();
    }

    public function get() { 

        $data = Getter::get("composant",[],true);  
        echo json_encode(array_map(function($item) {
            $item['fields'] = json_decode($item['fields'], true);
            return [ 
                'name' => $item['name'],
                'title' => $item['title'],
                'category' => $item['category'],
                'fields' => $item['fields'],
            ];
        }, $data));
    }

}
<?php

namespace Controllers;

use Models\Getter;

class LoadPage
{

    public function load($name, $params)
    {
        ob_start();
        require 'Views/template/' . $name . '.php';
        $content = ob_get_clean();

        $checkAdmin = explode("/",$name);
        if ($checkAdmin[0] === 'admin') {
            require("Views/layout_admin.php"); 
            return;
        }

        require("Views/layout.php");
    }

    public function frombdd($name, $params)
    {  
        if (!isset($params) || !isset($params["id"])) {
            header("HTTP/1.0 404 Not Found");
            echo "Article non trouvée";
            exit;
        }
        $table = explode(".",$name)[0] === "products" ? "produits" : "pages";
        $article = Getter::get($table, [
            'id' => $params['id']
        ]);
        if (!$article) {
            header("HTTP/1.0 404 Not Found");
            echo "Article non trouvé";
            exit;
        }
        $contenue = $article['contenue'];

        
        $json = file_get_contents('php://input');
        $data = json_decode(!isset($contenue) || $contenue === "" ? "[]" : $contenue , true); 

        if (is_array($data)) {
            ob_start();
            foreach ($data as $block) {
                VisualEditorController::renderTemplate($block);
            }
            $content = ob_get_clean(); 
            $page_id = $params['id'];
            require_once __DIR__ . '/../Views/layout.php';
        } 
    }

   
}

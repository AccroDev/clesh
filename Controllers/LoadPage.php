<?php

namespace Controllers;

use Models\Getter;

class LoadPage
{

    public function load($name)
    {
        ob_start();
        require 'Views/template/' . $name . '.php';
        $content = ob_get_clean();

        require("Views/layout.php");
    }

    public function frombdd($name, $params)
    {
        if (!isset($params) || !isset($params["id"])) {
            header("HTTP/1.0 404 Not Found");
            echo "Article non trouvé";
            exit;
        }

        $article = Getter::get('articles', [
            'id' => $params['id']
        ]);
        if (!$article) {
            header("HTTP/1.0 404 Not Found");
            echo "Article non trouvé";
            exit;
        }
        $contenue = $article['contenue'];
    }

   
}

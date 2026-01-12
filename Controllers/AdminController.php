<?php

namespace Controllers;

use Models\Setter;

class AdminController{

    public function createpage()
    {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $accreditation = $_POST["accreditation"];

        if (!$title || !$description || !$accreditation) {
            header("Location: /admin?Error=true");
            return;
        } 
        
        $rq = Setter::insert("pages", [
            "titre" => $title,
            "description" => $description,
            "accreditation" => $accreditation,
            "contenue" => "",
            "autheur" => $_SESSION["user"]["id"],
            "date" => date("Y-m-d H:i:s")
        ]);
        if ($rq) {
            header("Location: /admin?Success=true");
        } else {
            header("Location: /admin?Error=true");
        }
    }

}
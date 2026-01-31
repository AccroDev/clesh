<?php


namespace Controllers;

use Models\GetPdo;
use Models\Getter;
use Models\Setter;

class AuthController {
    
    public function signin()
    {
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!$nom || !$email || !$password) {
            header("Location: /signin?Error=true");
            return;
        }

        $request=Setter::insert("users",[
            "name"=>$nom,
            "password"=>$password,
            "email"=>$email,
            "accreditation"=>1,
        ]);
        $_SESSION['user'] = [];
        $_SESSION['user']['id'] = $nom;
        $_SESSION['user']['nom'] = $nom;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['password'] = $password;
        $_SESSION['user']['accreditation'] = 1;
        header("Location: /?success=true");
    }


    public function login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!$email || !$password) {
            header("Location: /login?Error=true");
            return;
        }
        //recuperation a la base de donnees

        $user = Getter::get("users",[
            "email" => $email,
            "password" => $password,
        ]);


        if (!$user || empty($user)) {
            header("Location: /login?Error=true");
            return;
        } 
        
        $_SESSION['user'] = [];
        $_SESSION['user']['id'] = $user["id"];
        $_SESSION['user']['nom'] = $user["name"];
        $_SESSION['user']['email'] = $user["email"];
        $_SESSION['user']['password'] = $user["password"];
        $_SESSION['user']['accreditation'] = $user["accreditation"];
        header("Location: /?success=true");
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
 
}
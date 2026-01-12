<?php


namespace Controllers;

use Models\GetPdo;
use Models\Getter;

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

        $bdd = GetPdo::getpdo();
        $rq = $bdd->prepare("INSERT INTO users (name,password,email,accreditation) VALUES (?,?,?,?)");
        $rq->execute([
            $nom, $password, $email, 1
        ]);
        $_SESSION['user'] = [];
        $_SESSION['user']['id'] = $nom;
        $_SESSION['user']['nom'] = $nom;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['password'] = $password;
        $_SESSION['user']['accreditation'] = 1;
        header("Location: /");
    }


    public function login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!$email || !$password) {
            header("Location: /login?Error=true");
            return;
        }

        $bdd = GetPdo::getpdo();
        $rq = $bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ? ORDER BY id DESC Limit 1");
        $rq->execute([
            $email, $password
        ]);

        $user = $rq->fetch();
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
        header("Location: /?success");
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
 
}
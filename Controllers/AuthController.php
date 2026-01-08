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

        $_SESSION['nom'] = $nom;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['accreditation'] = 1;
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

        $_SESSION['nom'] = $user["name"];
        $_SESSION['email'] = $user["email"];
        $_SESSION['password'] = $user["password"];
        $_SESSION['accreditation'] = $user["accreditation"];
        header("Location: /");
    }
 
}
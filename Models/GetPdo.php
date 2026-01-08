<?php
namespace Models;
use PDO;


class GetPdo
{ 
    public static function getpdo():pdo 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=clesh', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
}

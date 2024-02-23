<?php
define("HOST", "localhost");
define("BDD", "zelda");
define("USER", "root");
define("MDP", "");

function connect()
{
    try {
        $bdd = new PDO('mysql:host=' . HOST . ';dbname=' . BDD, USER, MDP, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $bdd;
    
    } catch (PDOException $e) {
        echo "Problème de connexion à la base BBD <br>" . $e->getMessage();
    }
}

?>
<?php

try

{

    $bdd = new PDO('mysql:host=localhost;dbname=formulairePHP;charset=utf8', 'root', '');
    echo "Connexion BDD OK!";

}

catch (Exception $e)

{

        die('Erreur : ' . $e->getMessage());

}

?>
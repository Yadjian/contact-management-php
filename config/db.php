<?php
    
include 'config.php';

try {
    $dbh = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
    echo "Connexion réussi !";

} catch (PDOException $e) {
    echo "Echec de la connexion ! : " . $e->getMessage();
}

?>
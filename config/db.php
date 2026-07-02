<?php
    
include 'config.php';

try {
    $pdo = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);

} catch (PDOException $e) {
    echo "Echec de la connexion ! : " . $e->getMessage();
}

return $pdo;
?>
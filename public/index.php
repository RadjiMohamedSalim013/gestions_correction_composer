<?php 


require_once __DIR__ . '/../vendor/autoload.php';
use config\Database;

try {
    $pdo = Database::getConnection();
    echo "Connexion réussie à la base de données.";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}



?>
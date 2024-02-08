<?php
try {
    $connexion = new PDO("mysql:host=127.0.0.1;port=3306;dbname=top_combat", 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (\Throwable $th) {
    die('erreur de connexion à la base de données');
}
?>
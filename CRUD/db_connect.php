<?php
$dsn = 'mysql:host=localhost;dbname=Crudkontakter;charset=utf8';
$username = 'root'; 
$password = ''; 

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Fel vid anslutning till databasen: " . $e->getMessage());
}
?>
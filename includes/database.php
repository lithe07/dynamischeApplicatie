<?php

// Database-instellingen
$host = 'localhost';
$db   = 'character_app';  
$user = 'root';           
$pass = '';               


// DSN = beschrijving van de verbinding
$dsn = "mysql:host=$host;dbname=$db";

// Veilige PDO-opties
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Verbinding maken
try {
    $conn = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Databaseverbinding mislukt: " . $e->getMessage();
    exit;
}
?>
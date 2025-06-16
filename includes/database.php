<?php
// Toon fouten tijdens ontwikkeling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database-instellingen
$host = 'localhost';
$db   = 'character_app';  // jouw databasenaam
$user = 'root';           // standaard bij XAMPP/Laragon
$pass = '';               // vaak leeg op localhost
$charset = 'utf8mb4';

// DSN = beschrijving van de verbinding
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

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
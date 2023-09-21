<?php

// Databasegegevens
$hostname = 'localhost';
$username = 'root';
$password = ''; // Geen wachtwoord
$database = 'klantcrud';

try {
    // Maak een PDO-verbinding
    $pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);

    // Stel PDO in op uitzonderingen gooien bij fouten
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optioneel: Stel PDO in op het gebruik van prepared statements
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    echo "Verbinding met de database is tot stand gebracht.<br/>";
} catch (PDOException $e) {
    // Vang eventuele fouten op
    die("Fout bij verbinden met de database: " . $e->getMessage());
}

?>

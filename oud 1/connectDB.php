<?php

$host = "localhost";
$username = "root";
$wachtwoord = "";
$database = "klantcrud";

try {
    // Verbinding maken met de database met behulp van PDO
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $wachtwoord);

    // PDO-foutmodus instellen op Exception om uitzonderingen te vangen
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Verbinding met de database is tot stand gebracht.<br/>";
} catch (PDOException $e) {
    die("Fout bij het verbinden met de database: " . $e->getMessage());
}

?>

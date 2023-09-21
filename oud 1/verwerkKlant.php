<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Inclusief de databaseverbinding
    require_once('connectDB.php');

    // Gegevens uit het formulier ophalen
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $telefoon = $_POST["telefoon"];

    // Voorbereid SQL-query om de klantgegevens in te voegen
    $query = "INSERT INTO klanten (voornaam, achternaam, email, telefoon) VALUES (:voornaam, :achternaam, :email, :telefoon)";
    $stmt = $db->prepare($query);

    // Bind de formuliergegevens aan de queryparameters
    $stmt->bindParam(":voornaam", $voornaam);
    $stmt->bindParam(":achternaam", $achternaam);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":telefoon", $telefoon);

    try {
        // Probeer de query uit te voeren
        $stmt->execute();
        echo "Klantgegevens zijn succesvol toegevoegd aan de database.";
    } catch (PDOException $e) {
        die("Fout bij het toevoegen van klantgegevens: " . $e->getMessage());
    }
} else {
    echo "Dit script moet worden aangeroepen via een POST-verzoek.";
}

?>

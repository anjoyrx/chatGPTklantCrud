<?php

// Inclusief de Klant klasse
require_once 'Klant.php';

// Controleer of het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ontvang de gegevens van het formulier
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $telefoon = $_POST['telefoon'];

    // Maak een nieuw Klant-object
    $klant = new Klant(NULL, NULL, NULL, NULL);

    // Roep de klantCreate-methode aan om de gegevens in de database te plaatsen
    $klant->klantCreate($voornaam, $achternaam, $email, $telefoon);

    // Druk de ingevoerde gegevens af
    echo "Ingevoerde klantgegevens:<br>";
    echo "Voornaam: $voornaam<br>";
    echo "Achternaam: $achternaam<br>";
    echo "E-mail: $email<br>";
    echo "Telefoon: $telefoon<br>";
} else {
    echo "Het formulier is niet ingediend.";
}

?>

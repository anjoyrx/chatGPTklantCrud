<?php

// Inclusief de Klant klasse
require_once 'Klant.php';

// Maak een nieuw Klant-object aan
$klant = new Klant('Jan', 'Jansen', 'jan.jansen@email.com', '123-456-7890');

// Haal de eigenschappen op met behulp van getters en druk ze af
echo "Klantgegevens:\n";
echo "Klant ID: " . $klant->getKlantId() . "\n";
echo "Voornaam: " . $klant->getVoornaam() . "\n";
echo "Achternaam: " . $klant->getAchternaam() . "\n";
echo "E-mail: " . $klant->getEmail() . "\n";
echo "Telefoon: " . $klant->getTelefoon() . "\n";

?>

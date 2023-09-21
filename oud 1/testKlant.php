<?php

// Inclusief de Klant klasse
require_once('Klant.php');

// Klantgegevens
$voornaam = "Jan";
$achternaam = "Jansen";
$email = "jan.jansen@example.com";
$telefoon = "123-456-7890";

// Een object van de Klant klasse aanmaken
$klant = new Klant($voornaam, $achternaam, $email, $telefoon);

// De eigenschappen van de klant afdrukken
echo "Klant ID: " . $klant->getKlantId() . "<br>";
echo "Voornaam: " . $klant->getVoornaam() . "<br>";
echo "Achternaam: " . $klant->getAchternaam() . "<br>";
echo "E-mail: " . $klant->getEmail() . "<br>";
echo "Telefoon: " . $klant->getTelefoon() . "<br>";



echo "<br/><br/><br/>";
$klant->klantCreate(); 

echo "<br/><br/><br/>";
$klant->klantRead();

?>

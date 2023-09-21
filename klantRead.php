<?php

// Inclusief de Klant klasse
require_once 'Klant.php';

try {
    // Maak een nieuw Klant-object
    $klant = new Klant(null, null, null, null);

    // Roep de klantReadTabel-methode aan om alle klantgegevens in een tabel weer te geven
    $klant->klantReadTabel();
} catch (PDOException $e) {
    die("Fout bij het lezen van klantgegevens: " . $e->getMessage());
}

?>

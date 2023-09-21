<?php

// Inclusief de Klant klasse
require_once 'Klant.php';

try {
    // Controleer of het klant-ID is ingediend via POST
    if (isset($_POST['klant_id'])) {
        // Ontvang het klant-ID uit het formulier
        $klant_id = $_POST['klant_id'];

        // Maak een nieuw Klant-object
        $klant = new Klant(null, null, null, null);

        // Roep de klantDelete-methode aan om klantgegevens te verwijderen
        $klant->klantDelete($klant_id);
    } else {
        echo "Klant-ID is niet ingediend.";
    }
} catch (PDOException $e) {
    die("Fout bij het verwijderen van klantgegevens: " . $e->getMessage());
}

?>

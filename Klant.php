<?php

class Klant {
    // Properties
    private $klant_id;
    private $voornaam;
    private $achternaam;
    private $email;
    private $telefoon;

    // Constructor
    public function __construct($voornaam, $achternaam, $email, $telefoon) {
        $this->voornaam = $voornaam;
        $this->achternaam = $achternaam;
        $this->email = $email;
        $this->telefoon = $telefoon;
    }

    // Setters
    public function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }

    public function setAchternaam($achternaam) {
        $this->achternaam = $achternaam;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefoon($telefoon) {
        $this->telefoon = $telefoon;
    }

    // Getters
	public function getKlantId() {
        return $this->klant_id;
    }

    public function getVoornaam() {
        return $this->voornaam;
    }

    public function getAchternaam() {
        return $this->achternaam;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefoon() {
        return $this->telefoon;
    }
	// Methode om alle klantgegevens uit de database op te halen en af te drukken
    public static function klantRead() {
        require_once 'connectDB.php'; // Inclusief de databaseverbinding

        try {
            // Query om alle klantgegevens op te halen
            $sql = "SELECT * FROM klanten";

            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Uitvoeren van de query
            $stmt->execute();

            // Ophalen van alle resultaten als een associatieve array
            $klanten = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Afdrukken van de klantgegevens
            foreach ($klanten as $klant) {
                echo "Klant ID: " . $klant['klant_id'] . "\n";
                echo "Voornaam: " . $klant['voornaam'] . "\n";
                echo "Achternaam: " . $klant['achternaam'] . "\n";
                echo "E-mail: " . $klant['email'] . "\n";
                echo "Telefoon: " . $klant['telefoon'] . "\n";
                echo "--------------------\n";
				echo "<br/>";
            }
        } catch (PDOException $e) {
            die("Fout bij het lezen van klantgegevens: " . $e->getMessage());
        }
    }
	public function klantCreate($voornaam, $achternaam, $email, $telefoon) {
        require_once 'connectDB.php'; // Inclusief de databaseverbinding

        try {
            // Query om klantgegevens toe te voegen aan de database
            $sql = "INSERT INTO klanten (voornaam, achternaam, email, telefoon) VALUES (:voornaam, :achternaam, :email, :telefoon)";

            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Binden van de parameters aan de query
            $stmt->bindParam(':voornaam', $voornaam, PDO::PARAM_STR);
            $stmt->bindParam(':achternaam', $achternaam, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':telefoon', $telefoon, PDO::PARAM_STR);

            // Uitvoeren van de query
            $stmt->execute();

            echo "Klantgegevens zijn succesvol toegevoegd aan de database.";
        } catch (PDOException $e) {
            die("Fout bij het toevoegen van klantgegevens: " . $e->getMessage());
        }
		
		
    }
	    // Methode om alle klantgegevens in een tabel weer te geven
    public function klantReadTabel() {
        require_once 'connectDB.php'; // Inclusief de databaseverbinding

        try {
            // Query om alle klantgegevens op te halen
            $sql = "SELECT * FROM klanten";

            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Uitvoeren van de query
            $stmt->execute();

            // Ophalen van alle resultaten als een associatieve array
            $klanten = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Controleer of er klantgegevens zijn om weer te geven
            if (count($klanten) > 0) {
                echo "<h1>Klantgegevens</h1>";
                echo "<table border='1'>";
                echo "<tr><th>Klant ID</th><th>Voornaam</th><th>Achternaam</th><th>E-mail</th><th>Telefoon</th></tr>";

                foreach ($klanten as $klant) {
                    echo "<tr>";
                    echo "<td>" . $klant['klant_id'] . "</td>";
                    echo "<td>" . $klant['voornaam'] . "</td>";
                    echo "<td>" . $klant['achternaam'] . "</td>";
                    echo "<td>" . $klant['email'] . "</td>";
                    echo "<td>" . $klant['telefoon'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "Geen klantgegevens gevonden.";
            }
        } catch (PDOException $e) {
            die("Fout bij het lezen van klantgegevens: " . $e->getMessage());
        }
    }
	
    // Methode om klantgegevens te verwijderen op basis van klant-ID
    public function klantDelete($klant_id) {
        require_once 'connectDB.php'; // Inclusief de databaseverbinding

        try {
            // Query om klantgegevens op te halen op basis van klant-ID
            $sql = "SELECT * FROM klanten WHERE klant_id = :klant_id";

            // Voorbereiden van de SQL-query
            $stmt = $pdo->prepare($sql);

            // Binden van de klant-ID aan de query
            $stmt->bindParam(':klant_id', $klant_id, PDO::PARAM_INT);

            // Uitvoeren van de query
            $stmt->execute();

            // Ophalen van klantgegevens als een associatieve array
            $klant = $stmt->fetch(PDO::FETCH_ASSOC);

            // Controleer of klantgegevens zijn gevonden
            if ($klant) {
                echo "Klantgegevens gevonden:<br>";
                echo "Klant ID: " . $klant['klant_id'] . "<br>";
                echo "Voornaam: " . $klant['voornaam'] . "<br>";
                echo "Achternaam: " . $klant['achternaam'] . "<br>";
                echo "E-mail: " . $klant['email'] . "<br>";
                echo "Telefoon: " . $klant['telefoon'] . "<br>";

                // Vraag of de gebruiker de gegevens wil verwijderen
                echo "<br>";
                echo "Weet je zeker dat je deze klantgegevens wilt verwijderen?";
                echo "<form action='klantVerwerkDelete.php' method='post'>";
                echo "<input type='hidden' name='klant_id' value='" . $klant_id . "'>";
                echo "<input type='submit' value='Ja, verwijder'>";
                echo "</form>";
            } else {
                echo "Klantgegevens met opgegeven ID niet gevonden.";
            }
        } catch (PDOException $e) {
            die("Fout bij het ophalen van klantgegevens: " . $e->getMessage());
        }
    }
}
?>

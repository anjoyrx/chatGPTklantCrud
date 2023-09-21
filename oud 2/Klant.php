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

}
?>

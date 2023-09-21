<?php
require_once('connectDB.php'); // Inclusief de databaseverbinding
class Klant {
    private $klant_id;
    private $voornaam;
    private $achternaam;
    private $email;
    private $telefoon;

    public function __construct($voornaam, $achternaam, $email, $telefoon) {
        $this->voornaam = $voornaam;
        $this->achternaam = $achternaam;
        $this->email = $email;
        $this->telefoon = $telefoon;
    }

    // Setter voor klant_id
    public function setKlantId($klant_id) {
        $this->klant_id = $klant_id;
    }

    // Getter voor klant_id
    public function getKlantId() {
        return $this->klant_id;
    }

    // Setter voor voornaam
    public function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }

    // Getter voor voornaam
    public function getVoornaam() {
        return $this->voornaam;
    }

    // Setter voor achternaam
    public function setAchternaam($achternaam) {
        $this->achternaam = $achternaam;
    }

    // Getter voor achternaam
    public function getAchternaam() {
        return $this->achternaam;
    }

    // Setter voor email
    public function setEmail($email) {
        $this->email = $email;
    }

    // Getter voor email
    public function getEmail() {
        return $this->email;
    }

    // Setter voor telefoon
    public function setTelefoon($telefoon) {
        $this->telefoon = $telefoon;
    }

    // Getter voor telefoon
    public function getTelefoon() {
        return $this->telefoon;
    }
	
	    // Methode om alle klantgegevens uit de database op te halen en af te drukken
    public function klantRead() {
        global $db; // Gebruik de eerder gedefinieerde databaseverbinding

        try {
            // Voorbereid SQL-query om alle klantgegevens op te halen
            $query = "SELECT * FROM klanten";
            $stmt = $db->prepare($query);
            $stmt->execute();

            // Loop door de resultaten en druk klantgegevens af
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "Klant ID: " . $row['klant_id'] . "<br>";
                echo "Voornaam: " . $row['voornaam'] . "<br>";
                echo "Achternaam: " . $row['achternaam'] . "<br>";
                echo "E-mail: " . $row['email'] . "<br>";
                echo "Telefoon: " . $row['telefoon'] . "<br><br>";
            }
        } catch (PDOException $e) {
            die("Fout bij het ophalen van klantgegevens: " . $e->getMessage());
        }
    }
	    // Methode om klantgegevens toe te voegen aan de database
    public function klantCreate() {
        global $db; // Gebruik de eerder gedefinieerde databaseverbinding

        try {
            // SQL-query om een nieuwe klant toe te voegen
            $query = "INSERT INTO klanten (voornaam, achternaam, email, telefoon) VALUES (:voornaam, :achternaam, :email, :telefoon)";
            $stmt = $db->prepare($query);

            // Bind de waarden aan de queryparameters
            $stmt->bindParam(":voornaam", $this->voornaam);
            $stmt->bindParam(":achternaam", $this->achternaam);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":telefoon", $this->telefoon);

            // Voer de query uit om de klant toe te voegen
            if ($stmt->execute()) {
                return true; // Succesvol toegevoegd
            } else {
                return false; // Fout bij het toevoegen
            }
        } catch (PDOException $e) {
            die("Fout bij het toevoegen van klantgegevens: " . $e->getMessage());
        }
    }
}

?>

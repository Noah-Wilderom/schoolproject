<?php

class Students {
    private $conn;

    public function __construct() {
        $this->conn = new Database;
        $this->helper = new Helpers();
    }

    /**
     * Maak een student account
     * 
     * 
     */
    public function createStudent(string $email, string $voornaam, 
    string $achternaam, string $hashed_wachtwoord, string $dob, 
    string $telefoonnummer, string $geslacht, string $code)
    {
        $studentid = StudentHelper::generateStudentId();
        if(empty($email) || empty($voornaam) || empty($achternaam) 
        || empty($hashed_wachtwoord) || empty($dob) 
        || empty($telefoonnummer) || empty($geslacht) 
        || empty($studentid)) return false;

        $result = StudentHelper::checkNewStudentCode($code);
        if($result) {
            

        

            $this->conn->query("INSERT INTO students 
                (student_id, email, voornaam, achternaam, wachtwoord, dob, telefoonnummer, geslacht, opleiding, klas, opleiding_type)
                VALUES (:student_id, :email, :voornaam, :achternaam, :wachtwoord, :dob, :telefoonnummer, :geslacht, :opleiding, :klas, :opleiding_type)");
            $this->conn->bind(":student_id", $studentid);
            $this->conn->bind(":email", $email);
            $this->conn->bind(":voornaam", $voornaam);
            $this->conn->bind(":achternaam", $achternaam);
            $this->conn->bind(":wachtwoord", $hashed_wachtwoord);
            $this->conn->bind(":dob", $dob);
            $this->conn->bind(":telefoonnummer", $telefoonnummer);
            $this->conn->bind(":geslacht", $geslacht);
            $this->conn->bind(":opleiding", $result->opleiding);
            $this->conn->bind(":klas", $result->klas);
            $this->conn->bind(":opleiding_type", $result->categorie);
            try {
                $this->conn->execute();
                Log::addLog("New student account created with student_id: " . $studentid);
                Helpers::makeToken($email, true);
                header("Location: " . URLROOT . "/student/confirm_email");
            } catch (\PDOException $e) {
                echo "Account creation failed: " . $e->getMessage();
            }
        } else {
            echo "<script>alert('Code klopt niet')</script>";
        }
    }

    public function confirmEmail() {
        $token = Helpers::getURI('token');
        if(!is_string($token)){
            echo "Klik op de link uit uw email om uw account te verifieren";
            return false;
        }
        if(strlen($token) > 10) {
            $this->conn->query("SELECT * FROM verify_tokens WHERE token = :token");
            $this->conn->bind(":token", $token);
            $result = $this->conn->single();

            if(!$this->helper->checkIfAccountIsVerified($result->email)){
                $this->conn->query("UPDATE students SET is_verified = true WHERE email = :email");
                $this->conn->bind(":email", $result->email);
                $this->conn->execute();
                $this->conn->query("DELETE FROM verify_tokens WHERE email = :email");
                $this->conn->bind(":email", $result->email);
                $this->conn->execute();
                Log::addLog("Student_email: " . $result->email . " has succesfully been verified");
                echo "Uw account is geverifierd!";
            }
        }
    }

    public function loginStudent(string $email, string $wachtwoord) {
        if(empty($email) || empty($wachtwoord)) {
            return false;
        }

        $this->conn->query("SELECT * FROM students WHERE email = :email");
        $this->conn->bind(":email", $email);
        $result = $this->conn->single();
        if(password_verify($wachtwoord, $result->wachtwoord)) {
            $_SESSION['student_email'] = $result->email;
            $_SESSION['student_voornaam'] = $result->voornaam;
            $_SESSION['student_achternaam'] = $result->achternaam;
            $_SESSION['student_id'] = $result->student_id;
            $_SESSION['student_klas'] = $result->klas;
            $_SESSION['student_img'] = $result->img;
            header("Location: " . URLROOT . "/student/home");
        }
    }

    public function getInfoStudent(array $info, $studentid) {
        if(!is_array($info) || !is_int($studentid)) return false;

        $this->conn->query("SELECT * FROM students WHERE $studentid = :studentid");
    }

    
    
}
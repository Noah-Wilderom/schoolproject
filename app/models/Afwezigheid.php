<?php

class Afwezigheid {
    private $conn;
    

    public function __construct() {
        $this->conn = new Database();
    }

    public function getAfwezigheid(Int $studentid) {
        $this->conn->query("SELECT * FROM afwezigheid WHERE student_id = :studentid ORDER BY aangemeld_datum DESC");
        $this->conn->bind(":studentid", $studentid);
        $results = $this->conn->resultSet();

        return $results;
    }

    public function getAantalLessenGemist($vanaf, $tot, $klas) {
        $this->conn->query("SELECT * FROM rooster WHERE (datum BETWEEN :vanaf AND :tot) AND klas = :klas");
        $this->conn->bind(":vanaf", $vanaf);
        $this->conn->bind(":tot", $tot);
        $this->conn->bind(":klas", $klas);
        $result = $this->conn->resultSet();
        // print_r($result);
        return count($result);
    }
    public function getLeeftijd($date = null) {
        if(is_null($date) && isset($_SESSION['student_id'])) {
            $this->conn->query("SELECT dob FROM students WHERE student_id = :studentid");
            $this->conn->bind(":studentid", $_SESSION['student_id']);
            $result = $this->conn->single();
            $date = $result->dob;
        }
        $dob = new DateTime($date);
        $nu = new DateTime();
        $verschil = $nu->diff($dob);
        $leeftijd = $verschil->y;
        return $leeftijd;

    }

    public function addAbsentieStudent($reden, $vanaf, $vanaf_tijd, $tot, $tot_tijd, $studentid) {
        $this->conn->query("INSERT INTO afwezigheid (student_id, reden, absentie, vanaf, tot, aangemaakt_door) 
        VALUES (:student_id, :reden, :absentie, :vanaf, :tot, :aangemaakt_door)");
        $this->conn->bind(":student_id", $studentid);
        // Format naar de juiste Datetime 
        if(!empty($vanaf_tijd)) {
            $vanaf = $vanaf . $vanaf_tijd . ":00";
        } else {
            $vanaf = $vanaf . " 00:00:00";
        }
        if(!empty($tot_tijd)) {
            $tot = $tot . $tot_tijd . ":00";
        } else {
            $tot = $tot . " 00:00:00";
        }
        $this->conn->bind(":reden", $reden);
        if($reden === "Ziek") {
            $status = 'Geoorloofd';
        } else {
            $status = 'Ongeoorloofd';
        }
        $vanaf = date("Y-m-d H:i:s", strtotime($vanaf));
        $tot = date("Y-m-d H:i:s", strtotime($tot));


        $this->conn->bind(":absentie", $status);
        $this->conn->bind(":vanaf", $vanaf);
        $this->conn->bind(":tot", $tot);
        $this->conn->bind(":aangemaakt_door", "Student");

        try {
            $this->conn->execute();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
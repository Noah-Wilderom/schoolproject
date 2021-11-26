<?php

class StudentHelper {

    public function __construct() {
        $this->conn = new Database();
    }
    
    public static function generateStudentId() {
        $length = 6;
        $karakters = '0123456789';
        $karaktersLength = strlen($karakters);
        $studentid = '';
        for ($i = 0; $i < $length; $i++) {
            $studentid .= $karakters[rand(0, $karaktersLength -1)];
        }
        return $studentid;


    }

    public static function checkTelefoonNummer(string $nummer) {
        if(preg_match("(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)", $nummer)) {
            return true;
        }
        return false;
    }

    public static function checkNewStudentCode(string $code) {
        $conn = new Database();
        $conn->query("SELECT * FROM new_student_codes WHERE code = :code");
        $conn->bind(":code", $code);
        try {
            $conn->execute();
            $result = $conn->single();
            $conn->query("DELETE FROM new_student_codes WHERE code = :code");
            $conn->bind(":code", $code);
            $conn->execute();
            return $result;
        } catch (\Throwable $th) {
            return false;
        }
    }

    
}
<?php

class Log {

    public function __construct() {
        $this->conn = new Database();
    }

    public function getLogs() {
        $this->conn->query( "SELECT * FROM logs ORDER BY date DESC" );
        $resultsArr = $this->conn->resultSet();
        foreach( $resultsArr as $results ) {
            echo "<br><strong>Log:</strong> $results->log <strong>Automod:</strong> $results->automod <strong>Date:</strong> $results->date";
            
        }
    }

    public static function addLog( string $log, string $automod = NULL ) {
        $class = new Log();
        $class->conn->query("INSERT INTO `logs` (`log`, `automod`) VALUES (:logs, :mod);");
        $class->conn->bind(":logs", $log);
        if( is_null( $automod ) ) {
            $class->conn->bind( ":mod", "False" );
        } else {
            $class->conn->bind( ":mod", $automod );
        }
        if($class->conn->execute()) {
            return true;
        }
        echo "Mislukt";

    }
}
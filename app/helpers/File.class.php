<?php
/**
 * File class
 * 
 * @author Noah Wilderom
 */
class File {

    // Upload manager
    private $file = [];
    private $name = "";
    private $directory = "";
    private $max_file_size = "5"; // Default is 5
    private $error = "";

    /**
    * Zet het bestand vast
    * 
    * @return Mixed
    * 
    */
    public function setFile($f) {
        if (is_array($f)) {
            $this->file = $f;
        } else {
            $this->error = "Geen geldige upload format";
        }
        return $this;

    }

    // Zet de naam als die opgegeven is
    public function setName($n) {
        $this->name = $n;
        return $this;
    } 

    // Checkt of de maximum een 
    public function setMaxSize($s) {
        if(is_int($s) && $s > 0) {
            $this->max_file_size = $s * 1024 * 1024;
        } else {
            $this->error = "Maximum upload grootte moet een int zijn en groter zijn dan 0";
        }
        return $this;
    }

    public function setDirectory($d) {
        $this->directory = $d;
        return $this;
    }

    public function getExtension() {
        $this->fn = explode(".", $this->file['name']);
        $this->ext = end($this->fn);
        return $this->ext;

    }

    public function getSize() {
        return $this->file['size'];
    }

    public function getArrayData() {
        return $this->file;
    }

    public function getDir() {
        if(!is_dir($this->directory)) {
            mkdir($this->directory);
        }
        return $this->directory;
    }

    public function getName() {
        if(empty($this->name)) {
            $this->name = date("YmdHi");
        }
        $this->fc = $this->getDir() . DIRECTORY_SEPARATOR . $this->name . "." . $this->getExtension();
        // Checkt of de naam van het bestand al bestaat
        if(file_exists($this->fc)) {
            // Generate een nieuwe naam 
            $this->i = 0;
            
            do {
                $this->name = $this->name . $this->i;
                $this->fc = $this->getDir() . DIRECTORY_SEPARATOR . $this->name . "." . $this->getExtension();
                $this->i++;
            } while (file_exists($this->fc));
        }

        return $this->name;
    }

    public function destination() {
        $this->d = $this->getDir() . DIRECTORY_SEPARATOR . $this->getName() . "." . $this->getExtension();
        return $this->d;
    }

    public function uploadFile() {
        // checkt bestands grootte 
        if($this->max_file_size < $this->getSize()){
            $this->error = "Bestand is te groot, de bestands groote is " . round($this->getSize() / (1024*1024), 2) . "MB. De maximum is " . round($this->max_file_size / (1024*1024), 2) . "MB";
        }
        
        if(empty($this->error)) {
            return move_uploaded_file($this->file['tmp_name'], $this->destination());
        } else {
            return false;
        }
    }

    public function showError() {
        return $this->error;
    }

    /* 
    if($this->fn = explode(".", $this->file['name']) == "exe" OR "js" OR "jsx" OR "html" OR "py" OR "cpp" OR "cs" OR "bat") {
            $this->error = "De bestands type is niet toegestaan.";
        } else {
            return $this->ext;
        }
    */
}
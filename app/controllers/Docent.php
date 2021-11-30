<?php
/**
 * Docent Controller 
 * 
 * @author Noah Wilderom
 * @see Controller class
 */
Class Docent extends Controller {

    public function __construct() {
        $this->docentModel = $this->model('Docenten');
        
    }

    public function home() {
  
        $this->view('docent/home');
    }

    public function login() {
  
        $this->view('docent/auth/login');
    }

    public function registreer() {
  
        $this->view('docent/auth/registreer');
    }

    
 
    /* Voorbeeld

     public function about() {
        $this->view('pages/about');
    }
    Url: MVCphp/shop/about 
    Als de url er zo uitziet dan word de functie about() ingeladen
    In de functie word de view functie aangeroepen die in de Controller 
    staat deze functie laad het bestand in genaamd about.php in de map pages
    */
    

    

}
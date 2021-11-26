<?php
/**
 * Home Controller 
 * 
 * @author Noah Wilderom
 * @see Controller class
 */
Class Home extends Controller{

    public function __construct() {
        $this->studentModel = $this->model('Students');
        $this->helper = $this->helpers('Helpers');
        
    }

    public function index() {
  
        $this->view('home/index');
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
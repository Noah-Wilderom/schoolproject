<?php
/**
 * Student Controller 
 * 
 * @author Noah Wilderom
 * @see Controller class
 */

 class Student extends Controller {

    public function __construct() {
        $this->studentModel = $this->model('Students');
        $this->helper = $this->helpers('Helpers');
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $this->studentModel->loginStudent($_POST['email'], $_POST['wachtwoord']);
        }
        $this->view('student/auth/login');
    }

    public function registreer() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hashed_wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
            $this->studentModel->createStudent($_POST['email'], $_POST['voornaam'], $_POST['achternaam'], $hashed_wachtwoord, $_POST['dob'], $_POST['telefoonnummer'], $_POST['geslacht'], $_POST['code']);
        }
        $this->view('student/auth/registreer');
    }

    public function confirm_email() {
        if(Helpers::getURI('token')) {
            $this->studentModel->confirmEmail();
        }

        $this->view('student/confirm_email');
    }

    public function home() {
        $this->view('student/home');
    }

    public function afwezigheid() {
        $this->afwezigheidModel = $this->model('Afwezigheid');

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->afwezigheidModel->addAbsentieStudent($_POST['reden'], $_POST['vanaf'], $_POST['vanaf-tijd'], $_POST['tot'], $_POST['tot-tijd'], $_POST['studentid']);
        }

        $this->view('student/afwezigheid');
    }

    public function agenda() {

        $this->view('student/agenda');
    }

    public function resultaten() {
        $this->view('student/resultaten');
    }

    public function berichten() {
        $this->view('student/berichten');
    }

    public function overzicht() {
        $this->view('student/overzicht');
    }
    public function instellingen() {
        $this->view('student/instellingen');
    }

    
}
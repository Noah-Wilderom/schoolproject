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
        $this->studentHelper = $this->helpers('StudentHelper');
        $this->helper = $this->helpers('Helpers');
        $this->file = $this->helpers('File');
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!isset($_SESSION)) session_start();
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
        $data = [];
        array_push($data, $this->studentHelper->getDates());
        array_push($data, $this->studentModel->getLessen($data));
        $this->view('student/agenda', $data);
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
        
        $data = [
            'file_directory' => '',
            'file_extension' => '',
            'file_size' => '',  
            'file_name' => '',  
            'file_error' => '',
            'telefoonnummer_huidig' => $this->studentModel->getStudentInfo("telefoonnummer"),
            'img_huidig' => $this->studentModel->getStudentInfo("img"),
            'telefoonnummer_nieuw' => '',
            'wachtwoord_nieuw' => ''
        ];

        if(isset($_POST['submit'])) {
            if(empty($_POST['wachtwoord'])) {
                if(!$this->studentModel->checkWachtwoord($_POST['wachtwoord'])) return false;
                $data = [
                    'file_directory' => '',
                    'file_extension' => '',
                    'file_size' => '',  
                    'file_name' => '',  
                    'file_error' => '',
                    'telefoonnummer_huidig' => $this->studentModel->getStudentInfo("telefoonnummer"),
                    'img_huidig' => $this->studentModel->getStudentInfo("img"),
                    'telefoonnummer_nieuw' => '',
                    'img_nieuw' => ''
                ];
            }
            if(!empty($_FILES['upload'])) {
                $f = $_FILES['upload'];
                $this->file->setFile($f)->setMaxSize(10)
                ->setDirectory("uploads");
    
                if($this->file->getExtension() == 'jpg' || $this->file->getExtension() == 'jpeg' || $this->file->getExtension() == 'png') {                   
                    $data = [
                        'file_directory' => $this->file->getDir(),
                        'file_extension' => $this->file->getExtension(),
                        'file_size' => $this->file->getSize(),  
                        'file_name' => $this->file->getName(),  
                        'file_error' => $this->file->showError(),
                        'telefoonnummer_huidig' => $this->studentModel->getStudentInfo("telefoonnummer"),
                        'img_huidig' => $this->studentModel->getStudentInfo("img"),
                        'telefoonnummer_nieuw' => $_POST['telefoonnummer'],
                        'wachtwoord_nieuw' => $_POST['update-wachtwoord']
                    ];
                    if($this->file->uploadFile()) {
                        $_SESSION['student_img'] = $data['file_name'] . "." . $data['file_extension'];
                    } else {
                        $data = [
                            'file_directory' => '',
                            'file_extension' => '',
                            'file_size' => '',  
                            'file_name' => '',  
                            'file_error' => $this->file->showError(),
                            'telefoonnummer_huidig' => '',
                            'img_huidig' => '',
                            'telefoonnummer_nieuw' => '',
                            'wachtwoord_nieuw' => ''
                        ];
                    }
                    
                } else {
                    $data = [
                        'file_directory' => '',
                        'file_extension' => '',
                        'file_size' => '',  
                        'file_name' => '',  
                        'file_error' => 'Alleen jpg, jpeg en png fotos zijn toegestaan',
                        'telefoonnummer_huidig' => '',
                        'img_huidig' => '',
                        'telefoonnummer_nieuw' => '',
                        'wachtwoord_nieuw' => ''
                    ];
                }
            }

            if($this->studentModel->saveInstellingen($data)) {
                Notification::showNotification("Uw instellingen zijn succesvol opgeslagen");
            } else {
                Notification::showNotification("Uw instellingen zijn helaas niet opgeslagen check of uw alles goed hebt ingevuld");
            }
            
            
        }

        $this->view('student/instellingen', $data);
    }

    
}
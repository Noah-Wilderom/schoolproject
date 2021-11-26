<?php
    /**
     *  Laad de Model, View & Helpers in
     * 
     * @method Void model(String $model)
     * @method Void view(String $view)
     * @method Object helpers(String $class)
     * 
     * @author Noah Wilderom
     */ 
    class Controller {
        public function model(String $model) {
            // Require model bestand
            require_once '../app/models/' . $model . '.php';
            // Laad de model in
            return new $model();
        }

        // Laad de view (checkt of het bestand bestaat)
        public function view(String $view, $data = []) {
            if(file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View bestaat niet");
            }
        }

        public function helpers(String $class) {
            if(file_exists('../app/helpers/' . $class . '.class' .'.php')) {
                require_once '../app/helpers/' . $class . '.class' . '.php';

                return new $class();
            } else {
                die("Helper bestaat niet");
            }
        }
    }
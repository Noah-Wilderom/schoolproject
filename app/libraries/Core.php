<?php
/**
 * Core app class
 * 
 * @author Noah Wilderom
 */
    Class Core {
        protected $currentController = 'Home';
        protected $currentMethod = 'index';
        protected $params = [];

        // In de construct word de URL behandeld (Voorbeeld URL: MVCphp/shop/tshirt/mannen)
        public function __construct() {
           $url = $this->getURL();
           if(isset($url[0])) {
                // Zoek in controller naar eerste url waarde, ucwords zorgt ervoor dat alles met een hoofletter begint
                if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // De nieuwe controller word toegewezen
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
                } 
           }
            

            // Require de controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;

            // In de controller word gezocht naar een functie voor de 2de check van de URL
            if(isset($url[1])) {
                if(method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }

            // Krijg de parameters
            $this->params = $url ? array_values($url) : [];

            // Callback met de array params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }


        /**
         * Krijg de volledige URL
         * 
         * @return Array
         */
        public function getURL() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                // Filter de url van alles wat niet in een url thuishoort 
                $url = filter_var($url, FILTER_SANITIZE_URL);
                // URL -> Array
                $url = explode('/', $url);
                return $url;
            }
        }
    }
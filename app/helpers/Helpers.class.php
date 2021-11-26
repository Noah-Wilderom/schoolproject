<?php

/**
 * Helpers class om verschillende kleine taken ui te voeren
 * 
 * @method Array getURL()
 * @method String getURI(String $param)
 * 
 * @author Noah Wilderom
 */
class Helpers {


    /**
         * Krijg de volledige URL
         * 
         * @return Array
         */
    public static function getURL() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            // Filter de url van alles wat niet in een url thuishoort 
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // URL -> Array
            $url = explode('/', $url);
            return $url;
        }
    }


    /**
     * Krijg de $_GET info die je nodig hebt. Op de mvc manier
     * 
     * Voorbeeld(mvcphp/pages/index/product/12) 
     *                   
     * mvcphp = Websitedomein
     * 
     * pages = Controller 
     * 
     * index = View
     * 
     * product = URI key [@param String $param]  
     *        
     * 12 = value van de URI key
     *
     * Voorbeeld voor meer URI info
     * 
     * (mvcphp/pages/index/product/12/review/25)
     * 
     * @param String $param Geef de URI key op om de value eruit te halen
     * 
     * @return String De value van de URI info
     */
    public static function getURI(String $param) {
        $urlArray = Helpers::getUrl();
        if(array_search($param, $urlArray)) {
            $uri = array_search($param, $urlArray);              
            $valueIndex = $uri + 1;
            return $urlArray[$valueIndex];
        } else {
            return $urlArray;
        }
        
    }

    public static function generateToken() {
        $length = 35;
        $karakters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $karaktersLength = strlen($karakters);
        $token = '';
        for ($i = 0; $i < $length; $i++) {
          $token .= $karakters[rand(0, $karaktersLength - 1)];
        }
        return $token;
    }

    public static function makeToken($email, $mailit, $token = NULL) {
        $conn = new Database();
        if(is_null($token)) {
            $token = Helpers::generateToken();
        }
        $conn->query("INSERT INTO verify_tokens (email, token) VALUES(:email, :token)");
        $conn->bind(":email", $email);
        $conn->bind(":token", $token);
        $conn->execute();

        Mail::verifyAccountEmail($token, $email);
    }

    public function checkIfAccountIsVerified(string $email) {
        $conn = new Database();
        $conn->query("SELECT is_verified FROM students WHERE email = :email");
        $conn->bind(":email", $email);
        $result = $conn->single();
        if($result->is_verified == "true") {
            return true;
        } else if($result->is_verified == "false") {
            return false;
        }
    }
}

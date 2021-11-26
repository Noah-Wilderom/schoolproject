<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail
{

    function __construct()
    {
        $this->conn = new Database();
    }

    static function verifyAccountEmail($token, $emailadres) {
      //Load Composer's autoloader
      require '../app/vendor/autoload.php';
      $phpmailer = new PHPMailer(true);
      $phpmailer->isSMTP();
      $phpmailer->Host = MAIL_HOST;
      $phpmailer->SMTPAuth = true;
      $phpmailer->Port = 2525;
      $phpmailer->Username = MAIL_USERNAME;
      $phpmailer->Password = MAIL_PASSWORD;
      $phpmailer->setFrom(EMAIL, 'Mailer');
      $phpmailer->addAddress($emailadres);

      //Content
      $phpmailer->isHTML(true);
      $phpmailer->Subject = 'Verify je account!';
      $phpmailer->Body    = "<p>Klik op deze link om je account te verifieren</p><br><a href='" . URLROOT . "/student/confirm_email/token/" . $token . "'>Klik hier!</a>";
      if($phpmailer->send()) {
        return true;
      }

    }
}

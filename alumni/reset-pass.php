<?php 
require_once('../config/+koneksi.php');
require_once('../models/database.php');
$koneksi = mysqli_connect($host, $user, $pass, $database);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google;

require_once("../vendor/autoload.php");
require_once ("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once ("../vendor/phpmailer/phpmailer/src/Exception.php");
require_once ("../vendor/phpmailer/phpmailer/src/OAuth.php");
require_once ("../vendor/phpmailer/phpmailer/src/POP3.php");
 

if(isset($_POST["reset_pass"])){

    $emailTo = $_POST["email"]; //email kamu atau email penerima link reset

    $code = uniqid(true); //Untuk kode atau parameter acak

    $query = mysqli_query($koneksi, "INSERT INTO reset_password VALUES ('','$emailTo','$code')");

    if(!$query){ header("location:gagal.php");}
    else{

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    //ganti dengan email dan password yang akan di gunakan sebagai email pengirim
    $mail->Username = 'alumnisdnrandusongo@gmail.com';
    $mail->Password = 'kp_tracerstudy';
    $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    //ganti dengan email yg akan di gunakan sebagai email pengirim
    $mail->setFrom('no-reply@sdnrandusongo.com', 'Admin SDN Randu Songo');
    $mail->addAddress($_POST['email']);
    $url = "http://" . $_SERVER["HTTP_HOST"] .dirname($_SERVER["PHP_SELF"]). "/reset.php?reset_pass=$code";
    $mail->isHTML(true);
    $mail->Subject = "Reset Password";
    $mail->Body    = "<h1>Permintaan reset password</h1><p> Klik <a href='$url'>link ini</a> untuk mereset password</p>" ;

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
 header("location:pesan.php");
    }
    
}
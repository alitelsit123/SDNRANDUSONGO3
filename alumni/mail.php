<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("../vendor/autoload.php");
require_once ("../src/PHPMailer.php");
require_once ("../src/Exception.php");
require_once ("../src/OAuth.php");
require_once ("../src/POP3.php");
require_once ("../src/SMTP.php");

$mail = new PHPMailer(true);
$mail->SMTPDebug = 4;
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
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
//ganti dengan email yg akan di gunakan sebagai email pengirim
$mail->setFrom('no-reply@sdnrandusongo.com', 'Admin SDN Randu Songo');
$mail->addAddress($_POST['email'], $_POST['username']);
$mail->isHTML(true);
$mail->Subject = "Aktivasi pendaftaran Member";
$mail->Body = "Selamat, anda berhasil membuat akun.
<hr>
username : ".$username."
<hr>
password : ".$password."
Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
<hr>
 <a href='http://localhost/tracerstudy_epizy/alumni/activation.php?t=".$token."'>http://localhost/tracerstudy_epizy/alumni/activation.php?t=".$token."</a>  ";
$mail->send();
echo 'Message has been sent';
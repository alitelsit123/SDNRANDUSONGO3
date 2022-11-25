<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
$koneksi = mysqli_connect($host, $user, $pass, $database);

if(isset($_POST["new_pass"])){

    $email = $_POST["email"];

    $password = $_POST["password"];
    $query = mysqli_query($koneksi, "UPDATE login SET password = '$password' WHERE email = '$email'");
    if($query){

        mysqli_query($koneksi, "DELETE * FROM reset_password WHERE code = '$code'");
        header('Location: pesan_sukses.php');
}
    

else{
    alert('gagal ubah password');
}
}
 ?>
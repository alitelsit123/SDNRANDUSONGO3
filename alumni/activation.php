<?php
ob_start();

require_once('../config/+koneksi.php');
require_once('../models/database.php');
require_once('../models/m_kontak.php');
require_once('../models/m_login.php');


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    <title>Web Alumni | Daftar Akun</title>

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="../favicon-randusongo.png">
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
  </head>

  <body style="margin-top: 50px;">

   <div class="container">
      <div class="form-login center-block" style="max-width: 450px;">
           
         <?php
         $koneksi = mysqli_connect($host, $user, $pass, $database);
         $token=$_GET['t'];
         $sql_cek=mysqli_query($koneksi, "SELECT * FROM login WHERE token='".$token."' and aktif='0'");
         $jml_data=mysqli_num_rows($sql_cek);
         if ($jml_data>0) {
             //update data users aktif
             mysqli_query($koneksi,"UPDATE login SET aktif='1' WHERE token='".$token."' and aktif='0'");
             echo '<div class="alert alert-success">
                        Akun anda sudah aktif, silahkan <a href="login.php">Login</a>
                        </div>';
         }else{
                    //data tidak di temukan
                     echo '<div class="alert alert-warning">
                        Invalid Token!
                        </div>';
                   }
    ?>
      </div>    
   </div>   

   <!-- JavaScript -->
   <script src="../assets/js/jquery-1.10.2.js"></script>
   <script src="../assets/js/bootstrap.js"></script>

  </body>
</html>
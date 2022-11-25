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
  

    <title>reset password gagal</title>

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
        <h2 class="text-center">reset password gagal!</h2>
        <div class="justify-content-center">
        <a type="button" class="btn btn-alert" href="forget.php">Kembali</a>
        </div>
        
      </div>    
   </div>   

   <!-- JavaScript -->
   <script src="../assets/js/jquery-1.10.2.js"></script>
   <script src="../assets/js/bootstrap.js"></script>

  </body>
</html>
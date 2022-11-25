<?php
ob_start();

require_once('../config/+koneksi.php');
require_once('../models/database.php');
require_once('../models/m_login.php');

$connection = new Database($host, $user, $pass, $database);
$login = new Login($connection);
$message = '';
session_start();

// IF HAS LOGGED IN REDIRECT TO ADMIN PAGE
if(@$_SESSION['login_user']) {
   header('Location: index.php');
}

// IF HAS LOGGED IN REDIRECT TO ADMIN PAGE
if(isset($_POST['daftar-akun'])) {
   $username = $connection->conn->real_escape_string($_POST['username']);
   $password = $connection->conn->real_escape_string($_POST['password']);
   $email = $connection->conn->real_escape_string($_POST['email']);

   // buat token
   $token = hash('sha256', md5($email));
   $id_alumni = $login->tambah($email, $username, $password, 'alumni',$token,'0');

   header('location: register-success.php');
  
}
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
      <div class="header-login">Daftar Akun Alumni</div>      
      <form action="#" method="POST" class="form-login center-block" style="max-width: 450px;">
         <?= $message ?>
         <div class="form-group">
            <label for="email">E-mail</label>
            <input type="e-mail" name="email" id="email" class="form-control" placeholder="E-mail" required>
         </div>
         <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" maxlength="50">
         </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" maxlength="10">
         </div>
         <button type="submit" name="daftar-akun" class="btn btn-primary">Buat Akun</button>
         <span class="padding-left-lg">Sudah punya akun?<a href="login.php" class="btn btn-outline-info">Login</a></span>
      </form>
   </div>   

   <!-- JavaScript -->
   <script src="../assets/js/jquery-1.10.2.js"></script>
   <script src="../assets/js/bootstrap.js"></script>

  </body>
</html>
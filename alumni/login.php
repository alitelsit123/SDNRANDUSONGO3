<?php
ob_start();

require_once('../config/+koneksi.php');
require_once('../models/database.php');
require_once('../models/m_login.php');

$connection = new Database($host, $user, $pass, $database);
$login = new Login($connection);
$message = '';
session_start();
echo @$_SESSION['login_user'];

// IF HAS LOGGED IN REDIRECT TO ADMIN PAGE
if(@$_SESSION['login_user']) {
   header('Location: index.php');
}

if(isset($_POST['submit'])) {
   $username = $connection->conn->real_escape_string($_POST['username']);
   $password = $connection->conn->real_escape_string($_POST['password']);
   if($login->check_auth($username, $password,'1')->num_rows) {
      $user_data = $login->check_auth($username, $password,1)->fetch_assoc();
      // var_dump($user_data['type']);
      // exit();
      // SET SESSION
      $_SESSION['login_user'] = $user_data['type'];
      $_SESSION['id_user'] = $user_data['id_login'];
      $message = '';
      header('Location: index.php');
   } else if($login->check_auth($username, $password,'0')->num_rows){
      $message = '<div class="alert alert-danger" role="alert">Akun anda belum diverifikasi</div>';
   }
   else {
      $message = '<div class="alert alert-danger" role="alert">Username/password salah</div>';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    <title>Web Alumni | Login</title>

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
      <div class="header-login">Login Alumni</div>      
      <form action="#" method="POST" class="form-login center-block" style="max-width: 450px;">
         <?= $message ?>
         <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
         </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
         </div>
         <a href="register.php" class="btn btn-outline-info">Daftar</a>
         <button type="submit" name="submit" class="btn btn-primary">Login</button>
        <a href="../index.php">
      <button type="button" class="btn btn-success">home</button>
        </a>

        <a href="forget.php">
           <p  style="text-align:right;">Lupa password?</p>
         
        </a>
      </form>
   </div>   

   <!-- JavaScript -->
   <script src="../assets/js/jquery-1.10.2.js"></script>
   <script src="../assets/js/bootstrap.js"></script>

  </body>
</html>
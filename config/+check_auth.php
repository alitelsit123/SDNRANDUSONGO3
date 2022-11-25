<?php
   session_start();
   $url = explode('/',trim($_SERVER['REQUEST_URI']));
   if(isset($_SESSION['login_user'])) {
      if($_SESSION['login_user'] == 'admin') {
         if($url[1] <> 'admin'){
            header('location: ../admin/index.php');
         }
      }
      if($_SESSION['login_user'] == 'alumni') {
         if($url[1] <> 'alumni'){
            header('location: ../alumni/index.php');
         }
      }
   } else {
      header('Location: login.php');
   }
?>
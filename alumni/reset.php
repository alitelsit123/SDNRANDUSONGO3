<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
$koneksi = mysqli_connect($host, $user, $pass, $database);

  if(!isset($_GET["reset_pass"])){

    exit("Can't find page");

  }

  $code = $_GET["reset_pass"];

  $query = mysqli_query($koneksi, "SELECT email FROM reset_password WHERE code = '$code' ");

  if(mysqli_num_rows($query)==0){

    exit("Can't find page");

  }

  $row = mysqli_fetch_array($query);

 

?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <title>Send Reset Password</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
          <div class="card">
            <div class="card-header text-center">
              Send Reset Password
            </div>
            <div class="card-body">
            <form action="new-pass.php" method="post">

<div class="form-group">

    <label>New Password</label>

    <input class="form-control" type="password" name="password" placeholder="New Password">

    <input type="hidden" value="<?php echo $row["email"]?>" name="email">

</div>

<button class="btn btn-success" type="submit" name="new_pass">Update</button>

</form>
            </div>
          </div>
      </div>

   </body>
</html>
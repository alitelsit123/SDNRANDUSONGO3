<?php
class Login{

     private $mysqli;

     function __construct($conn) {
     	$this->mysqli = $conn;

     }

     public function check_auth($username, $password) {
     	$db = $this->mysqli->conn;
     	$sql = "SELECT * FROM login WHERE (username = '$username' OR email='$username') AND password = '$password'";
     	$query = $db->query($sql) or die ($db->error);
     	return $query;
     }

     public function tampil($id_user = null) {
     	$db = $this->mysqli->conn;
     	$sql = "SELECT * FROM login";
     	if($id_user != null) {
     		$sql .= " WHERE id_login = $id_user";
     	}
     	$query = $db->query($sql) or die ($db->error);
     	return $query;
     }
     
     public function tambah($email, $username, $password, $type, $token,$aktif) {
          $db = $this->mysqli->conn;
          $cek = "SELECT * FROM login WHERE email= '".$email."' ";
          $query = $db->query($cek) or die ($db->error);
          $row = mysqli_fetch_assoc($query);
          if($row>0){
               echo '<div class="alert alert-warning">
                            Email anda sudah pernah terdaftar!
                          </div>';
          } else {
               $sql = "INSERT INTO login(email, username, password, type, token, aktif) VALUES('$email', '$username', '$password', '$type', '$token', '$aktif')";
               $query = $db->query($sql) or die ($db->error);
               include('mail.php');

               if($query){
               header('location: register-success.php');

               }
          }

          return $db->insert_id;
     }

     public function hapus($id_login) {
          $db = $this->mysqli->conn;
          $sql = "DELETE FROM login WHERE id_login='$id_login'";
          $query = $db->query($sql) or die ($db->error);
          return $query;
     }

     public function update($id_login){
          $db = $this->mysqli->conn;
          $sql = "UPDATE FROM login WHERE id_login='$id_login' AND username='$username' AND password='$password' ";
          $query = $db->query($sql) or die($die->error);
          return $query;
     }
    

}
?> 

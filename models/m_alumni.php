<?php
class Alumni{

     private $mysqli;

     function __construct($conn) {
     	$this->mysqli = $conn;

     }
     public function tampil($id_alumni = null, $id_login = null) {
     	$db = $this->mysqli->conn;
     	$sql = "SELECT * FROM alumni";
     	if($id_alumni != null) {
     		$sql .= " WHERE id_alumni = $id_alumni";
     	}
     	if($id_login != null) {
     		$sql .= " WHERE id_login = $id_login";
     	}
      $sql .= " ORDER BY id_alumni desc";
     	$query = $db->query($sql) or die ($db->error);
     	return $query;
     }

     public function tambah($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jenis_kelamin, $alamat, $tlp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan) {
      $filename = '';
      if (isset($_FILES["foto"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $filename = $target_dir.$id_alumni.time().uniqid().uniqid().'.'.$imageFileType;
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
          move_uploaded_file($_FILES["foto"]["tmp_name"],__DIR__.'/../'.$filename);
        } else {
          $filename = '';
        }
      }

      $db = $this->mysqli->conn;
     	$db->query("INSERT INTO alumni VALUES('$id_alumni', '$id_user', '$nama_alumni', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$tlp', '$tgl_masuk', '$tgl_lulus', '$smp', '$sma_smk', '$pekerjaan', '$filename')") or die($db->error);
             
     }


     public function edit($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jenis_kelamin, $alamat, $tlp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan) {
        $filename = '';
        if (isset($_FILES["foto"])) {
          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["foto"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $filename = $target_dir.$id_alumni.time().uniqid().uniqid().'.'.$imageFileType;
          $check = getimagesize($_FILES["foto"]["tmp_name"]);
          if($check !== false) {
            move_uploaded_file($_FILES["foto"]["tmp_name"],__DIR__.'/../'.$filename);
          } else {
            $filename = '';
          }
        } else {
          if (isset($_POST['foto_old'])) {
            $filename = $_POST['foto_old'];
          }
        }
        $db = $this->mysqli->conn;
        $db->query("UPDATE alumni SET id_login = '$id_user',nama_alumni = '$nama_alumni', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', tlp = '$tlp', tgl_masuk = '$tgl_masuk', tgl_lulus = '$tgl_lulus', smp = '$smp', sma_smk = '$sma_smk', pekerjaan = '$pekerjaan', foto = '$filename' WHERE id_alumni = '$id_alumni'") or die ($db->error);
     }

     public function hapus($id){
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM alumni WHERE id_alumni = '$id' ") or die ($db->error); 
     }

    

}
?> 

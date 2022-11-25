<?php
class Pengantar{

   private $mysqli;

   function __construct($conn) {
      $this->mysqli = $conn;
   }

   public function tampil($id = null) {
      $db = $this->mysqli->conn;
      $sql = "SELECT * FROM pengantar_kepsek";
      if($id != null) {
         $sql .= " WHERE id_pengantar = $id";
      }
      $query = $db->query($sql) or die ($db->error);
      return $query;
   }

   public function edit($id_pengantar, $deskripsi, $gambar) {
      $db = $this->mysqli->conn;
      $db->query("UPDATE pengantar_kepsek SET deskripsi_pengantar = '$deskripsi', gambar = '$gambar' WHERE id_pengantar = '$id_pengantar'") or die ($db->error);
   }
}
?> 

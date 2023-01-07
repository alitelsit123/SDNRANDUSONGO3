<?php
class Kelas{

  private $mysqli;

  function __construct($conn) {
  $this->mysqli = $conn;

  }
  public function all() {
    $db = $this->mysqli->conn;
    $sql = "SELECT * FROM kelas";
    $sql .= " ORDER BY id desc";
    $query = $db->query($sql) or die ($db->error);
    return $query;
  }
}
?> 

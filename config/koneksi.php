<?php
    $koneksi = mysqli_connect("localhost","root","","tracerstudy_epizy");
     
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }
?>
<?php
require_once('../models/m_pengantarkepsek.php');

$pengantar = new Pengantar($connection);
$tampil = $pengantar->tampil()->fetch_object();
?>

<div class="row">
  <div class="col-lg-12">
    <h1>Dashboard <small>Alumni</small></h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Blank Page</li>
    </ol>
  </div>
</div><!-- /.row --> 

<div class="row">
  <div class=" col-sm-12 col-md-6">
    <img src="../images/image_profil/<?= $tampil->gambar ?>" alt="foto-kepsek" style="max-width: 400px">
  </div>
  <div class=" col-sm-12 col-md-6">
    <h3 class="text-center">Kata Pengantar</h3>
    <p><?= htmlspecialchars_decode($tampil->deskripsi_pengantar) ?></p>
  </div>
</div>
<?php
ob_start();

require_once('../config/+koneksi.php');
require_once('../models/database.php');
require_once('../models/m_kontak.php');
require_once('../models/m_alumni.php');

$connection = new Database($host, $user, $pass, $database);
$kontak = new Kontak($connection);
$tampilKontak = $kontak->tampil()->fetch_object();
$alumni = new Alumni($connection);
$data_alumni = $alumni->tampil();
$url = @$_GET['page'];
$protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
$baseUrl = $protocol.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT']:'');

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SDN RANDUSONGO 3</title>
  
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="../favicon-randusongo.png">
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
</head>

<body class="container bg-pattern">

<header>  
  <!-- BANNER -->
  <div class="banner-wrap bg-success margin-top-md">
    <img src="../images/banner-sdn-randusongo-3_lg.jpeg" alt="banner-sdn-randusongo-3" class="header-banner-img">
    <!-- <h1>SDN BANNER</h1> -->
  </div>
  <!-- END BANNER -->

  <!-- NAVIGATION -->
  <nav class="navbar navbar-default margin-top-xs">
    <div class="container-fluids">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li ><a href="<?= $baseUrl ?>">Home</a></li>
          <li class="active"><a href="#">Alumni</a></li>
          <li <?= $url == 'kritik-saran' ? 'class="active"' : '' ?> ><a href="index.php">Login alumni</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>
  <!-- END NAVIGATION -->

<main class="bg-main padding-md">
  <div>
    <h1>Data Alumni</h1>
    <div class="margin-top-lg table-responsive">
        <table class="table table-bordered">
          <thead>
              <tr>
                <th width="50px">No.</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Lulus</th>
                <th>SMP</th>
                <th>SMA/SMK</th>
                <th>Pekerjaan</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach($data_alumni as $key => $dta) { ?>
              <tr>
                <td><?= ++$key ?></td>
                <td><?= $dta['nama_alumni'] ?></td>
                <td><?= $dta['jenis_kelamin'] ?></td>
                <td><?= $dta['tgl_masuk'] ?></td>
                <td><?= $dta['tgl_lulus'] ?></td>
                <td><?= $dta['smp'] ?></td>
                <td><?= $dta['sma_smk'] ?></td>
                <td><?= $dta['pekerjaan'] ?></td>
              </tr>
              <?php } ?>
          </tbody>
        </table>
    </div>
  </div>
</main>

<!-- Footer -->
<footer>
  <div class="bg-blue margin-top-sm margin-bottom-sm padding-sm">
    <p class="text-center text-white margin-bottom-xs">Copyright &copy; 2021 </p>
    <p class="text-center text-gray margin-bottom-xs">
      <a href="<?= $tampilKontak->instagram ?>" target="_blank" class="footer-link">Instagram</a> | <a href="<?= $tampilKontak->youtube ?>" target="_blank" class="footer-link">Youtube</a> | Ngawi, Jawa Timur 63272
    </p>
  </div>
</footer>

<!-- JavaScript -->
<script src="../assets/js/jquery-1.10.2.js"></script>
<script src="../assets/js/bootstrap.js"></script>

</body>
</html>

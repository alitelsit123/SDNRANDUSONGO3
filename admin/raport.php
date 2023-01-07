<?php
ob_start();

require_once('../config/+koneksi.php');
require_once('../config/+check_auth.php');
require_once('../models/database.php');

$connection = new Database($host, $user, $pass, $database);

$page = @$_GET['page'];
$protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
$baseUrl = $protocol.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT']:'');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAPOR</title>
  <style>
    * {
      margin:0;
      font-family: Helvetica,'Helvetica Neue';
    }
    .table td,.table th,.table{
      border-collapse: collapse;
    }
    .table td{
      text-align:center;
      padding-top:0.5rem;
      padding-bottom:0.5rem;
      padding-left:0.75rem;
      padding-right:0.75rem;
      border:1px solid black;
    }
    .table-header {
      font-weight:bold;
      font-size:18px;
    }
  </style>
</head>
<body>
  <?php
  require_once('../models/m_alumni.php');
  require_once('../models/m_nilai.php');
  require_once('../models/m_absensi.php');

  $connection = new Database($host, $user, $pass, $database);
  $id_user = $_SESSION['id_user'];
  $siswaClass = new Alumni($connection);
  $nilaiClass = new Nilai($connection);
  $absensiClass = new Absensi($connection);

  $siswa = isset($_GET['siswa']) ? $siswaClass->filterOne([
    'nama_alumni' => $_GET['siswa']
  ]):null;
  $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
  ?>
  <div style="padding:3rem;background-color:#ededed; max-width:100vw;overflow-x:auto;">
    <table width="100%">
      <div style="display:flex; align-items:center;justify-content:space-between;margin-bottom:1.75rem;">
        <h1 style="margin-bottom:1.25rem;">TRANSKRIP NILAI</h1>
        <img src="<?= $baseUrl.'/'.$siswa->foto ?>" alt="" srcset="" style="width:80px;height:80px;border-radius:999px;object-fit: cover;" />
      </div>
      <tr>
        <td style="padding-bottom: 0.5rem;padding-right: 0.75rem;">Nama Peserta Didik </td>
        <td style="padding-bottom: 0.5rem;padding-right: 0.75rem;font-weight: bold;">
          <?= $siswa->nama_alumni ?>
        </td>
        <td style="padding-bottom: 0.5rem;padding-right: 0.75rem;text-align:right;">NISN </td>
        <td style="padding-bottom: 0.5rem;padding-right: 0.75rem;font-weight: bold;text-align:right;"><?= $siswa->nisn ?></td>
      </tr>
      <tr>
        <td style="padding-bottom: 0.5rem;padding-right: 0.75rem;">Nomor Induk </td>
        <td style="padding-bottom: 0.5rem;padding-right: 0.75rem;"><?= $siswa->id_alumni ?></td>
      </tr>
    </table>
    <table class="table" style="margin-top:1.25rem" width="100%">
      <thead>
        <tr>
          <td class="table-header">TAHUN PELAJARAN</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          ?>
          <td colspan="8"><?= $data->tahun ?></td>
          <?php endwhile; ?>
        </tr>
        <tr>
          <td class="table-header">Semester</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          ?>
          <td colspan="4">1</td>
          <td colspan="4">2</td>
          <?php endwhile; ?>
          
        </tr>
        <tr>
          <td class="table-header" rowSpan="2">Mata Pelajaran</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          ?>
          <td colspan="2">Pengetahuan</td>
          <td colspan="2">Keterampilan</td>
          <td colspan="2">Pengetahuan</td>
          <td colspan="2">Keterampilan</td>
          <?php endwhile; ?>
        </tr>
        <tr>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          ?>
          <td>Angka</td>
          <td>Predikat</td>
          <td>Angka</td>
          <td>Predikat</td>
          <td>Angka</td>
          <td>Predikat</td>
          <td>Angka</td>
          <td>Predikat</td>
          <?php endwhile; ?>
        </tr>
        <tr>
          <td>Pendidikan Agama dan Budi Pekerti</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Pendidikan Agama dan Budi Pekerti'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Pendidikan Agama dan Budi Pekerti'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Pendidikan Pancasila dan Kewarganegaraan</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Pendidikan Pancasila dan Kewarganegaraan'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Pendidikan Pancasila dan Kewarganegaraan'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Bahasa Indonesia</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Bahasa Indonesia'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Bahasa Indonesia'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>

        <tr>
          <td>Matematika</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Matematika'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Matematika'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>

        <tr>
          <td>Ilmu Pengetahuan Alam</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Ilmu Pengetahuan Alam'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Ilmu Pengetahuan Alam'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Ilmu Pengetahuan Sosial</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Ilmu Pengetahuan Sosial'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Ilmu Pengetahuan Sosial'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Bahasa Inggris</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Bahasa Inggris'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Bahasa Inggris'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Seni Budaya</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Seni Budaya'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Seni Budaya'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Pendidikan Jasmani, Olahraga dan Kesehatan</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Pendidikan Jasmani, Olahraga dan Kesehatan'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Pendidikan Jasmani, Olahraga dan Kesehatan'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Ilmu Pengetahuan Sosial</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Ilmu Pengetahuan Sosial'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Ilmu Pengetahuan Sosial'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Prakarya</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Prakarya'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Prakarya'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Bahasa Daerah</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'Bahasa Daerah'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'Bahasa Daerah'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>BK & TI</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $nilais = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
            'mapel' => 'BK & TI'
          ]);
          $nilais2 = $nilaiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
            'mapel' => 'BK & TI'
          ]);
          ?>
          <?php if($nilais): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;if($nilais2): ?>
          <td><?= $nilais->nilai_angka ?></td>
          <td><?= $nilais->nilai_predikat ?></td>
          <td><?= $nilais->nilai_angka_keterampilan ?></td>
          <td><?= $nilais->nilai_predikat_keterampilan ?></td>
          <?php else: echo '<td></td><td></td><td></td><td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td style="border-right:none;" class="table-header">Absensi</td>
        </tr>
        <tr>
          <td>Sakit</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $absensis = $absensiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
          ]);
          $absensis2 = $absensiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
          ]);
          ?>
          <?php if($absensis): ?>
          <td colspan="4"><?= $absensis->sakit ?></td>
          <?php else: echo '<td></td>'; endif;if($absensis2): ?>
          <td colspan="4"><?= $absensis2->sakit ?></td>
          <?php else: echo '<td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Izin</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $absensis = $absensiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
          ]);
          $absensis2 = $absensiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
          ]);
          ?>
          <?php if($absensis): ?>
          <td colspan="4"><?= $absensis->izin ?></td>
          <?php else: echo '<td></td>'; endif;if($absensis2): ?>
          <td colspan="4"><?= $absensis2->izin ?></td>
          <?php else: echo '<td></td>'; endif;endwhile; ?>          
        </tr>
        <tr>
          <td>Alpha</td>
          <?php
          $getTahun = isset($_GET['siswa']) ? $nilaiClass->getTahun($_GET['siswa']):null;
          while($data = $getTahun->fetch_object()):
          $absensis = $absensiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 1,
          ]);
          $absensis2 = $absensiClass->filterGet([
            'nama_siswa' => $siswa->nama_alumni,
            'tahun' => $data->tahun,
            'semester' => 2,
          ]);
          ?>
          <?php if($absensis): ?>
          <td colspan="4"><?= $absensis->alpha ?></td>
          <?php else: echo '<td></td>'; endif;if($absensis2): ?>
          <td colspan="4"><?= $absensis2->alpha ?></td>
          <?php else: echo '<td></td>'; endif;endwhile; ?>          
        </tr>
      </thead>
    </table>
  </div>
</body>
</html>
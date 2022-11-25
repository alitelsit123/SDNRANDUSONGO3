<?php
require_once('../models/m_alumni.php');

$alumni = new Alumni($connection);
$id_user = $_SESSION['id_user'];
$tampil = $alumni->tampil(null, $id_user);
$data_alumni = [];
$status = 'simpan-alumni';

if($tampil->num_rows > 0) {
   $data_alumni = $tampil->fetch_assoc();
   $status = 'ubah-alumni';
}

// echo "<pre>";
// echo var_dump($data_alumni);
// echo "</pre>";

 if(isset($_POST['simpan-alumni'])) {
   $id_alumni = $connection->conn->real_escape_string($_POST['id_alumni']);
   $nama_alumni = $connection->conn->real_escape_string($_POST['nama_alumni']);
   $tgl_lahir = $connection->conn->real_escape_string($_POST['tgl_lahir']);
   $jk = $connection->conn->real_escape_string($_POST['jenis_kelamin']);
   $alamat = $connection->conn->real_escape_string($_POST['alamat']);
   $telp = $connection->conn->real_escape_string($_POST['telp']);
   $tgl_masuk = $connection->conn->real_escape_string($_POST['tgl_masuk']);
   $tgl_lulus = $connection->conn->real_escape_string($_POST['tgl_lulus']);
   $smp = $connection->conn->real_escape_string($_POST['smp']);
   $sma_smk = $connection->conn->real_escape_string($_POST['sma_smk']);
   $pekerjaan = $connection->conn->real_escape_string($_POST['pekerjaan']);

   // Tambah
   $alumni->tambah($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jk, $alamat, $telp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan);
   header('location: ?page=data-alumni&msg=success-simpan');
 }

 if(isset($_POST['ubah-alumni'])) {
   $id_alumni = $connection->conn->real_escape_string($_POST['id_alumni']);
   $nama_alumni = $connection->conn->real_escape_string($_POST['nama_alumni']);
   $tgl_lahir = $connection->conn->real_escape_string($_POST['tgl_lahir']);
   $jk = $connection->conn->real_escape_string($_POST['jenis_kelamin']);
   $alamat = $connection->conn->real_escape_string($_POST['alamat']);
   $telp = $connection->conn->real_escape_string($_POST['telp']);
   $tgl_masuk = $connection->conn->real_escape_string($_POST['tgl_masuk']);
   $tgl_lulus = $connection->conn->real_escape_string($_POST['tgl_lulus']);
   $smp = $connection->conn->real_escape_string($_POST['smp']);
   $sma_smk = $connection->conn->real_escape_string($_POST['sma_smk']);
   $pekerjaan = $connection->conn->real_escape_string($_POST['pekerjaan']);

   // Ubah
   $alumni->edit($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jk, $alamat, $telp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan);
   header('location: ?page=data-alumni&msg=success-ubah');
 }
?>

<div class="row">
  <div class="col-lg-12">
    <h1>DATA<small> ALUMNI</small></h1>
    <ol class="breadcrumb">
      <li><a href="../admin/index.php?page=dashboard"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Data Alumni</li>
    </ol>
  </div>
</div><!-- /.row -->

   <?php
      switch (@$_GET['msg']) {
         case 'success-simpan':
            echo '<div class="alert alert-success margin-top-sm" role="alert">Data Alumni Berhasil Disimpan</div>';
            break;

         case 'success-ubah':
            echo '<div class="alert alert-success margin-top-sm" role="alert">Data Alumni Berhasil Diubah</div>';
            break;
         
         default:
            break;
      }
   ?>

   <form action="#" method="POST">
      <div class="form-group">
         <label for="id_alumni">ID Alumni (Isi dengan NISN)</label>
         <input type="text" class="form-control" name="id_alumni" value="<?= $data_alumni['id_alumni'] ?? '' ?>" required>
      </div>

      <div class="form-group">
         <label for="nama_alumni">Nama Alumni</label>
         <input type="text" class="form-control" id="nama_alumni" name="nama_alumni" value="<?= $data_alumni['nama_alumni'] ?? '' ?>" placeholder="Nama Alumni" required>
      </div>

      <div class="form-group">
         <label for="tgl_lahir">Tanggal Lahir</label>
         <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data_alumni['tgl_lahir'] ?>" required>
      </div>

      <div class="form-group">
         <label for="jenis_kelamin">Jenis Kelamin</label>
         <select name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
            <?php 
               $jk = $data_alumni['jenis_kelamin'] ?? '';
               if($jk == '') {
            ?>
               <option selected disabled>-- Pilih jenis kelamin --</option>
               <option value="Pria">Pria</option>
               <option value="Wanita">Wanita</option>
            <?php
               } else {
            ?>
               <option value="Pria" <?= $jk == 'Pria' ? 'selected' : '' ?>>Pria</option>
               <option value="Wanita" <?= $jk == 'Wanita' ? 'selected' : '' ?>>Wanita</option>
            <?php
               }
            ?>
         </select>
      </div>

      <div class="form-group">
         <label for="alamat">Alamat</label>
         <textarea name="alamat" id="alamat" name="alamat" class="form-control" rows="5" required><?= $data_alumni['alamat'] ?? '' ?></textarea>
      </div>

      <div class="form-group">
         <label for="telp">Telephone</label>
         <input type="text" class="form-control" id="telp" name="telp" value="<?= $data_alumni['tlp'] ?? '' ?>" placeholder="Nomor Telephone" required>
      </div>

      <div class="form-group">
         <label for="tgl_masuk">Tanggal Masuk</label>
         <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?= $data_alumni['tgl_masuk'] ?? '' ?>" required>
      </div>
      
      <div class="form-group">
         <label for="tgl_lulus">Tanggal Lulus</label>
         <input type="date" class="form-control" id="tgl_lulus" name="tgl_lulus" value="<?= $data_alumni['tgl_lulus'] ?? '' ?>" required>
      </div>
      
      <div class="form-group">
         <label for="smp">SMP</label>
         <input type="text" class="form-control" id="smp" name="smp" value="<?= $data_alumni['smp'] ?? '' ?>" placeholder="Nama SMP" required>
      </div>
      
      <div class="form-group">
         <label for="sma_smk">SMA/SMK</label>
         <input type="text" class="form-control" id="sma_smk" name="sma_smk" value="<?= $data_alumni['sma_smk'] ?? '' ?>" placeholder="Nama SMA" required>
      </div>

      <div class="form-group">
         <label for="pekerjaan">Pekerjaan</label>
         <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $data_alumni['pekerjaan'] ?? '' ?>" placeholder="Pekerjaan" required>
      </div>

      <button type="submit" name="<?= $status ?>" class="btn btn-success">Simpan</button>
   </form>

  <script src="../assets/js/jquery-1.10.2.js"></script>
  <script type="text/javascript">
  // SET DATA TO MODAL FORM EDIT
  function editData(data) {
    $('#form-edit input[name=id_alumni]').val(data.id_alumni)
    $('#form-edit input[name=nama_alumni]').val(data.nama_alumni)
    $('#form-edit input[name=tgl_lahir]').val(data.tgl_lahir)
    $('#form-edit input[name=jenis_kelamin]').val(data.jenis_kelamin)
    $('#form-edit input[name=alamat]').val(data.alamat)
    $('#form-edit input[name=tlp]').val(data.tlp)
    $('#form-edit input[name=tgl_masuk]').val(data.tgl_masuk)
    $('#form-edit input[name=tgl_lulus]').val(data.tgl_lulus)
    $('#form-edit input[name=pekerjaan]').val(data.pekerjaan)
    // console.table(data)
  }  
  </script>
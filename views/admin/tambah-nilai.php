<div class="row">
  <div class="col-lg-12">
    <h1>TAMBAH<small> NILAI</small></h1>
    <ol class="breadcrumb">
      <li><a href="../admin/index.php?page=dashboard"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li><a href="<?= $baseUrl ?>/admin/index.php?page=data-nilai"><i class="icon-file-alt"></i> Data Nilai</a></li>
      <li class="active"><i class="icon-file-alt"></i> Tambah</li>
    </ol>
  </div>
</div><!-- /.row -->

<?php
// require_once('../config/+koneksi.php');
require_once('../models/m_nilai.php');
require_once('../models/m_alumni.php');

$connection = new Database($host, $user, $pass, $database);
$id_user = $_SESSION['id_user'];
$mnilai = new Nilai($connection);
$alumni = new Alumni($connection);
$alumnis = $alumni->get($alumni->tampil());
if(@$_GET['act'] == '') 
?>

<?php  
$protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
$baseUrl = $protocol.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT']:'');
?>




<div class="row">
  <div class=" col-lg-12">
    <div class="modal-body">
      <?php  
      $siswa_id = $_GET['nama_siswa'] ?? '';
      $semester = $_GET['semester'] ?? '';
      $tahun = $_GET['tahun'] ?? '';
      $mapel = $_GET['mapel'] ?? '';
      ?>
    </div>
    <form action="<?= $baseUrl.'/admin/index.php' ?>" method="get">
      <input type="hidden" name="page" value="tambah-nilai" />
      <div class="form-group">
        <label class="control-label" for="nama_alumni">Siswa</label>
        <select name="nama_siswa" id="" class="form-control" class="nama_siswa" onchange="this.form.submit()">
          <option value="">-- pilih siswa --</option>
          <?php foreach($alumnis as $row): ?>
          <option value="<?= $row->nama_alumni ?>" <?= $siswa_id == $row->nama_alumni ? 'selected':'' ?>><?= $row->nama_alumni ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </form>
    <?php if($siswa_id): ?>
    <form action="<?= $baseUrl.'/admin/index.php' ?>" method="get">
      <input type="hidden" name="page" value="tambah-nilai" />
      <input type="hidden" name="nama_siswa" value="<?= $siswa_id ?>" />
      <div class="form-group">
        <label class="control-label" for="nama_alumni">Semester</label>
        <select name="semester" id="" class="form-control" class="siswa_id" onchange="this.form.submit()">
          <option value="">-- pilih semester --</option>
          <option value="1" <?= $semester == 1 ? 'selected':'' ?>>1</option>
          <option value="2" <?= $semester == 2 ? 'selected':'' ?>>2</option>
        </select>
      </div>
      <div class="form-group">
        <label class="control-label" for="nama_alumni">Mata Pelajaran</label>
        <select name="mapel" id="" class="form-control" name="mapel" onchange="this.form.submit()">
          <option value="">-- pilih mapel --</option>
          <option value="Pendidikan Agama dan Budi Pekerti" <?= $mapel == 'Pendidikan Agama dan Budi Pekerti' ? 'selected':'' ?>>Pendidikan Agama dan Budi Pekerti</option>
          <option value="Pendidikan Pancasila dan Kewarganegaraan" <?= $mapel == 'Pendidikan Pancasila dan Kewarganegaraan' ? 'selected':'' ?>>Pendidikan Pancasila dan Kewarganegaraan</option>
          <option value="Bahasa Indonesia" <?= $mapel == 'Bahasa Indonesia' ? 'selected':'' ?>>Bahasa Indonesia</option>
          <option value="Matematika" <?= $mapel == 'Matematika' ? 'selected':'' ?>>Matematika</option>
          <option value="Ilmu Pengetahuan Alam" <?= $mapel == 'Ilmu Pengetahuan Alam' ? 'selected':'' ?>>Ilmu Pengetahuan Alam</option>
          <option value="Ilmu Pengetahuan Sosial" <?= $mapel == 'Ilmu Pengetahuan Sosial' ? 'selected':'' ?>>Ilmu Pengetahuan Sosial</option>
          <option value="Bahasa Inggris" <?= $mapel == 'Bahasa Inggris' ? 'selected':'' ?>>Bahasa Inggris</option>
          <option value="Seni Budaya" <?= $mapel == 'Seni Budaya' ? 'selected':'' ?>>Seni Budaya</option>
          <option value="Pendidikan Jasmani, Olahraga dan Kesehatan" <?= $mapel == 'Pendidikan Jasmani, Olahraga dan Kesehatan' ? 'selected':'' ?>>Pendidikan Jasmani, Olahraga dan Kesehatan</option>
          <option value="Prakarya" <?= $mapel == 'Prakarya' ? 'selected':'' ?>>Prakarya</option>
          <option value="Bahasa Daerah" <?= $mapel == 'Bahasa Daerah' ? 'selected':'' ?>>Bahasa Daerah</option>
          <option value="BK & TI" <?= $mapel == 'BK & TI' ? 'selected':'' ?>>BK & TI</option>
        </select>
      </div>
      <div class="form-group">
        <label class="control-label" for="nama_alumni">Tahun Ajaran</label>
        <input type="text" name="tahun" class="form-control th-ajaran" value="<?= $tahun ?>">
      </div>
      <?php
        if(!$semester || !$tahun || !$mapel):
      ?>
        <input type="submit" class="btn btn-success" name="editDataAlumni" value="Lanjut">
      <?php endif; ?>

      <script>
        window.onload = function() {
          $('.th-ajaran').keyup(function(e) {

          })
        }
      </script>
    </form>
    <?php endif; ?>
    <?php if($siswa_id && $semester && $tahun && $mapel):  ?>
    <form action="#" method="POST" id="form-edit" enctype="multipart/form-data">
        <input type="hidden" name="nama_siswa" value="<?= $siswa_id ?>" />
        <input type="hidden" name="semester" value="<?= $semester ?>" />
        <input type="hidden" name="tahun" value="<?= $tahun ?>" />
        <input type="hidden" name="mapel" value="<?= $mapel ?>" />
        
        <div class="form-group">
          <label class="control-label" for="nama_alumni">PENGETAHUAN</label>
        </div>
        <div class="form-group">
          <label class="control-label" for="nama_alumni">Nilai</label>
          <input type="hidden" name="id_alumni" id="id_alumni">
          <input type="number" min="1" max="100" name="nilai" class="form-control" required="">
        </div>

        <div class="form-group">
          <label class="control-label" for="nama_alumni">Predikat</label>
          <input type="hidden" name="id_alumni">
          <input type="text" name="predikat" class="form-control" required="" >
        </div>

        <div class="form-group">
          <label class="control-label" for="nama_alumni">KETERAMPILAN</label>
        </div>
        <div class="form-group">
          <label class="control-label" for="nama_alumni">Nilai</label>
          <input type="hidden" name="id_alumni" id="id_alumni">
          <input type="number" min="1" max="100" name="keterampilan_nilai" class="form-control" required="">
        </div>

        <div class="form-group">
          <label class="control-label" for="nama_alumni">Predikat</label>
          <input type="hidden" name="id_alumni">
          <input type="text" name="keterampilan_predikat" class="form-control" required="" >
        </div>
        
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" name="editDataAlumni" value="Simpan">
      </div>
    </form>
    <?php endif; ?>
  </div>
  <?php
    if(isset($_POST['tambah'])) {
      $id_alumni = $connection->conn->real_escape_string($_POST['id_alumni']);
      $nama_alumni = $connection->conn->real_escape_string($_POST['nama_alumni']);
      $tgl_lahir = $connection->conn->real_escape_string($_POST['tgl_lahir']);
      $jenis_kelamin = $connection->conn->real_escape_string($_POST['jenis_kelamin']);
      $alamat = $connection->conn->real_escape_string($_POST['alamat']);
      $tlp = $connection->conn->real_escape_string($_POST['tlp']);
      $tgl_masuk = $connection->conn->real_escape_string($_POST['tgl_masuk']);
      $tgl_lulus = $connection->conn->real_escape_string($_POST['tgl_lulus']);
      $smp = $connection->conn->real_escape_string($_POST['smp']);
      $sma_smk = $connection->conn->real_escape_string($_POST['sma_smk']);
      $pekerjaan = $connection->conn->real_escape_string($_POST['pekerjaan']);
      
      $store = $alumni->tambah($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jenis_kelamin, $alamat, $tlp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan);
      header("location: ?page=data-alumni");
    }
    
    if(isset($_POST['editDataAlumni'])) {
      $siswa_id = $connection->conn->real_escape_string($_POST['nama_siswa']);
      $semester = $connection->conn->real_escape_string($_POST['semester']);
      $tahun = $connection->conn->real_escape_string($_POST['tahun']);
      $nilai = $connection->conn->real_escape_string($_POST['nilai']);
      $predikat = $connection->conn->real_escape_string($_POST['predikat']);
      $nilaiKeterampilan = $connection->conn->real_escape_string($_POST['keterampilan_nilai']);
      $predikatKeterampilan = $connection->conn->real_escape_string($_POST['keterampilan_predikat']);
      $mapel = $connection->conn->real_escape_string($_POST['mapel']);
      $mnilai->create([
        'nama_siswa' => $siswa_id,
        'nilai_angka' => $nilai,
        'nilai_predikat' => $predikat,
        'nilai_angka_keterampilan' => $nilaiKeterampilan,
        'nilai_predikat_keterampilan' => $predikatKeterampilan,
        'semester' => $semester,
        'tahun' => $tahun,
        'mapel' => $mapel
      ]);
      header("location: ?page=data-nilai");
    }

    if(isset($_POST['deleteDataAlumni'])) {
      $id_alumni = $connection->conn->real_escape_string($_POST['id_alumni']);
      $alumni->hapus($id_alumni);
      header("location: ?page=data-alumni");
    }
  ?>
</div>

  <script src="../assets/js/jquery-1.10.2.js"></script>
  <script type="text/javascript">
  
  // SET DATA TO MODAL FORM EDIT
  function editData(data) {
    let elementJK = '';
    $('#form-edit input[name=id_alumni]').val(data.id_alumni)
    $('#form-edit input[name=nama_alumni]').val(data.nama_alumni)
    $('#form-edit input[name=tgl_lahir]').val(data.tgl_lahir)
    $('#form-edit input[name=alamat]').val(data.alamat)
    $('#form-edit input[name=tlp]').val(data.tlp)
    $('#form-edit input[name=tgl_masuk]').val(data.tgl_masuk)
    $('#form-edit input[name=tgl_lulus]').val(data.tgl_lulus)
    $('#form-edit input[name=smp]').val(data.smp)
    $('#form-edit input[name=sma_smk]').val(data.sma_smk)

    if(data.foto) {
      $('.show-image').html('<input type="hidden" name="foto_old" value="'+data.foto+'" /><img src="<?= $baseUrl ?>/'+data.foto+'" alt="" srcset="" style="width:80px;height:80px;border-radius:999px;object-fit: cover;" /><button type="button" class="btn btn-primary btn-xs btn-update-foto" data-foto="'+data.foto+'" style="margin-left:0.75rem;">Update</button>');
      $('.update-image').html('')
    } else {
      $('.show-image').html('')
      $('.update-image').html('<input type="file" name="foto" class="form-control" id="foto" />');
    }
    
    if(data.jenis_kelamin == 'Pria') {
      elementJK = `
        <option value="Pria" selected>Pria</option>
        <option value="Wanita">Wanita</option>
      `;
    } else if(data.jenis_kelamin == 'Wanita') {
      elementJK = `
        <option value="Pria">Pria</option>
        <option value="Wanita" selected>Wanita</option>
      `;
    } else {
      elementJK = `
        <option selected disabled>-- Pilih jenis kelamin --</option>
        <option value="Pria">Pria</option>
        <option value="Wanita">Wanita</option>
      `;
    }
    $('#form-edit select[name=jenis_kelamin]').html(elementJK);
    // console.table(data)
  }  

  // DELETE DATA ALUMNI
  function deleteData(nama_alumni, id_alumni) {
    let checkDelete = confirm('Apakah Anda ingin menghapus data "'+ nama_alumni+'" ?');
    $('#form-delete input[name=id_alumni]').val(id_alumni);
    if(checkDelete) {
      console.log('Berhasil dihapus');
      console.log($('#form-delete input[name=id_alumni]').val());
      $('#form-delete').submit();
      // location.reload();
    }
  }

  </script>
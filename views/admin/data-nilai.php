<div class="row">
  <div class="col-lg-12">
    <h1>DATA<small> NILAI</small></h1>
    <ol class="breadcrumb">
      <li><a href="../admin/index.php?page=dashboard"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Data Nilai</li>
    </ol>
  </div>
</div><!-- /.row -->

<?php
// require_once('../config/+koneksi.php');
require_once('../models/m_nilai.php');

$connection = new Database($host, $user, $pass, $database);
$id_user = $_SESSION['id_user'];
$alumni = new Nilai($connection);
$nilai = new Nilai($connection);
if(@$_GET['act'] == '') 
?>

<?php  
$protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
$baseUrl = $protocol.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT']:'');

$filterTahun = $_GET['tahun'] ?? '';
$filterSemester = $_GET['semester'] ?? '';
$filterSiswa = $_GET['siswa'] ?? '';
?>




<div class="row">
  <div class=" col-lg-12">
    <form action="<?= $baseUrl.'/admin/index.php' ?>" method="get" class="form-inline" style="margin-bottom:1.75rem">
      <input type="hidden" name="page" value="data-nilai" />
      <input type="text" name="tahun" value="<?= $filterTahun ?>" placeholder="Tahun Ajaran" class="form-control" />
      <select name="semester" id="" class="form-control" class="siswa_id" placeholder="Semester" style="width:200px;">
        <option value="">Filter Semester</option>
        <option value="1" <?= $filterSemester == 1 ? 'selected':'' ?>>1</option>
        <option value="2" <?= $filterSemester == 2 ? 'selected':'' ?>>2</option>
      </select>
      <input type="text" name="siswa" value="<?= $filterSiswa ?>" placeholder="Nama Siswa" class="form-control" />
      <button type="submit" class="btn btn-success">Cari</button>
      <a href="<?= $baseUrl.'/admin/index.php?page=data-nilai' ?>" class="btn btn-danger">Reset</a>
    </form>
    <div class="table-custom-wrap">
      <table class="table table-bordered table-hover table-striped">
        <tr>
          <th>No. </th>
          <th>Nama Siswa</th>
          <th>Semester</th>
          <th>Tahun Ajaran</th>
          <th>Mata Pelajaran</th>
          <th>Nilai</th>
          <th></th>
        </tr>
           <?php

        $tampil = $nilai->filter([
          'nama_siswa' => '%'.$filterSiswa.'%',
          'semester' => $filterSemester,
          'tahun' => $filterTahun
        ]);
        $no = 0;
        while($data = $tampil->fetch_object()) {
          ?>
        <tr>
          <td><?php echo ++$no; ?></td>
          <td><?= $data->nama_siswa ?></td>
          <td><?= $data->semester ?></td>
          <td><?= $data->tahun ?></td>
          <td><?= $data->mapel ?></td>
          <td>Pengetahuan <?= $data->nilai_angka . ' ('.ucwords($data->nilai_predikat).')' ?><br />Keterampilan<?= $data->nilai_angka_keterampilan . ' ('.ucwords($data->nilai_predikat_keterampilan).')' ?></td>
          <td align="center"> 
              <button class="btn btn-danger btn-xs" onclick="deleteData('<?= htmlspecialchars($data->nama_siswa).'\',\''. htmlspecialchars($data->id) ?>')"><i class="fa fa-trash-o"></i>hapus</button>
          </td>
        </tr>
          <?php
          } ?>

       </table>
    </div>
    <a href="<?= $baseUrl ?>/admin/index.php?page=tambah-nilai" class="btn btn-success" >Tambah data</a>

    <!-- FORM DELETE -->
    <form id="form-delete" action="#" method="POST">
        <input type="hidden" name="id">
        <input type="hidden" name="deleteDataAlumni">
    </form>
    <!-- END FORM DELETE -->
  </div>
  <?php

    if(isset($_POST['deleteDataAlumni'])) {
      $id = $connection->conn->real_escape_string($_POST['id']);
      var_dump($id);
      $nilai->hapus($id);
      header("location: ?page=data-nilai");
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
    $('#form-delete input[name=id]').val(id_alumni);
    if(checkDelete) {
      console.log('Berhasil dihapus');
      console.log($('#form-delete input[name=id]').val());
      $('#form-delete').submit();
      // location.reload();
    }
  }

  $(document).on('click','.btn-update-foto',function() {
    const data = {foto: $(this).data('foto')}
    $('.show-image').html('')
    $('.update-image').html('<input type="hidden" name="on_update" value="true" /><input type="file" name="foto" class="form-control" id="foto" /><button type="button" class="btn btn-danger btn-xs btn-update-foto-cancel" data-foto="'+data.foto+'" style="margin-top:0.75rem;">Batal</button>');
  })

  $(document).on('click','.btn-update-foto-cancel',function() {
    const data = {foto: $(this).data('foto')}
    $('.update-image').html('')
    $('.show-image').html('<input type="hidden" name="foto_old" value="'+data.foto+'" /><img src="<?= $baseUrl ?>/'+data.foto+'" alt="" srcset="" style="width:80px;height:80px;border-radius:999px;object-fit: cover;" /><button type="button" class="btn btn-primary btn-xs btn-update-foto" data-foto="'+data.foto+'" style="margin-left:0.75rem;">Update</button>');
  })
  </script>
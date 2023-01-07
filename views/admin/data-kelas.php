<div class="row">
  <div class="col-lg-12">
    <h1>DATA<small> Kelas</small></h1>
    <ol class="breadcrumb">
      <li><a href="../admin/index.php?page=dashboard"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Data Kelas</li>
    </ol>
  </div>
</div><!-- /.row -->

<?php
// require_once('../config/+koneksi.php');
require_once('../models/m_kelas.php');

$connection = new Database($host, $user, $pass, $database);
$id_user = $_SESSION['id_user'];
$kelas = new Kelas($connection);
if(@$_GET['act'] == '') 
?>

<?php  
$protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
$baseUrl = $protocol.$_SERVER['SERVER_NAME'].($_SERVER['SERVER_PORT'] != 80 ? ':'.$_SERVER['SERVER_PORT']:'');
?>




<div class="row">
  <div class=" col-lg-12">

    <div class="table-custom-wrap">
      <table class="table table-bordered table-hover table-striped">
        <tr>
          <!-- <th>No. </th> -->
          <th>Kelas</th>
        </tr>
           <?php

        $tampil = $kelas->all();
        $no = 0;
        while($data = $tampil->fetch_object()) {
          ?>
        <tr>
          <!-- <td><?php echo ++$no; ?></td> -->
          <td><?php echo $data->nama; ?></td>
          <!-- <td align="center"> 
              <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit" onclick="editData(<?= htmlspecialchars(json_encode($data)) ?>)"><i class="fa fa-edit"></i>edit</button>
              <button class="btn btn-danger btn-xs" onclick="deleteData('<?= htmlspecialchars($data->nama_alumni).'\',\''. htmlspecialchars($data->id_alumni) ?>')"><i class="fa fa-trash-o"></i>hapus</button>
          </td> -->
        </tr>
          <?php
          } ?>

       </table>
    </div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">Tambah data</button>

      

      <!-- FORM DELETE -->
      <!-- <form id="form-delete" action="#" method="POST">
          <input type="hidden" name="id_alumni">
          <input type="hidden" name="deleteDataAlumni">
      </form> -->
      <!-- END FORM DELETE -->
  </div>
  <?php
    // if(isset($_POST['tambah'])) {
    //   $id_alumni = $connection->conn->real_escape_string($_POST['id_alumni']);
    //   $nama_alumni = $connection->conn->real_escape_string($_POST['nama_alumni']);
    //   $tgl_lahir = $connection->conn->real_escape_string($_POST['tgl_lahir']);
    //   $jenis_kelamin = $connection->conn->real_escape_string($_POST['jenis_kelamin']);
    //   $alamat = $connection->conn->real_escape_string($_POST['alamat']);
    //   $tlp = $connection->conn->real_escape_string($_POST['tlp']);
    //   $tgl_masuk = $connection->conn->real_escape_string($_POST['tgl_masuk']);
    //   $tgl_lulus = $connection->conn->real_escape_string($_POST['tgl_lulus']);
    //   $smp = $connection->conn->real_escape_string($_POST['smp']);
    //   $sma_smk = $connection->conn->real_escape_string($_POST['sma_smk']);
    //   $pekerjaan = $connection->conn->real_escape_string($_POST['pekerjaan']);
      
    //   $store = $alumni->tambah($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jenis_kelamin, $alamat, $tlp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan);
    //   header("location: ?page=data-alumni");
    // }
    
    // if(isset($_POST['editDataAlumni'])) {
    //   $id_alumni = $connection->conn->real_escape_string($_POST['id_alumni']);
    //   $nama_alumni = $connection->conn->real_escape_string($_POST['nama_alumni']);
    //   $tgl_lahir = $connection->conn->real_escape_string($_POST['tgl_lahir']);
    //   $jenis_kelamin = $connection->conn->real_escape_string($_POST['jenis_kelamin']);
    //   $alamat = $connection->conn->real_escape_string($_POST['alamat']);
    //   $tlp = $connection->conn->real_escape_string($_POST['tlp']);
    //   $tgl_masuk = $connection->conn->real_escape_string($_POST['tgl_masuk']);
    //   $tgl_lulus = $connection->conn->real_escape_string($_POST['tgl_lulus']);
    //   $smp = $connection->conn->real_escape_string($_POST['smp']);
    //   $sma_smk = $connection->conn->real_escape_string($_POST['sma_smk']);
    //   $pekerjaan = $connection->conn->real_escape_string($_POST['pekerjaan']);

    //   $alumni->edit($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jenis_kelamin, $alamat, $tlp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan);
    //   header("location: ?page=data-alumni");
    // }

    // if(isset($_POST['deleteDataAlumni'])) {
    //   $id_alumni = $connection->conn->real_escape_string($_POST['id_alumni']);
    //   $alumni->hapus($id_alumni);
    //   header("location: ?page=data-alumni");
    // }
  ?>
</div>

  <script src="../assets/js/jquery-1.10.2.js"></script>
  <script type="text/javascript">
  
  // SET DATA TO MODAL FORM EDIT
  // function editData(data) {
  //   let elementJK = '';
  //   $('#form-edit input[name=id_alumni]').val(data.id_alumni)
  //   $('#form-edit input[name=nama_alumni]').val(data.nama_alumni)
  //   $('#form-edit input[name=tgl_lahir]').val(data.tgl_lahir)
  //   $('#form-edit input[name=alamat]').val(data.alamat)
  //   $('#form-edit input[name=tlp]').val(data.tlp)
  //   $('#form-edit input[name=tgl_masuk]').val(data.tgl_masuk)
  //   $('#form-edit input[name=tgl_lulus]').val(data.tgl_lulus)
  //   $('#form-edit input[name=smp]').val(data.smp)
  //   $('#form-edit input[name=sma_smk]').val(data.sma_smk)

  //   if(data.foto) {
  //     $('.show-image').html('<input type="hidden" name="foto_old" value="'+data.foto+'" /><img src="<?= $baseUrl ?>/'+data.foto+'" alt="" srcset="" style="width:80px;height:80px;border-radius:999px;object-fit: cover;" /><button type="button" class="btn btn-primary btn-xs btn-update-foto" data-foto="'+data.foto+'" style="margin-left:0.75rem;">Update</button>');
  //     $('.update-image').html('')
  //   } else {
  //     $('.show-image').html('')
  //     $('.update-image').html('<input type="file" name="foto" class="form-control" id="foto" />');
  //   }
    
  //   if(data.jenis_kelamin == 'Pria') {
  //     elementJK = `
  //       <option value="Pria" selected>Pria</option>
  //       <option value="Wanita">Wanita</option>
  //     `;
  //   } else if(data.jenis_kelamin == 'Wanita') {
  //     elementJK = `
  //       <option value="Pria">Pria</option>
  //       <option value="Wanita" selected>Wanita</option>
  //     `;
  //   } else {
  //     elementJK = `
  //       <option selected disabled>-- Pilih jenis kelamin --</option>
  //       <option value="Pria">Pria</option>
  //       <option value="Wanita">Wanita</option>
  //     `;
  //   }
  //   $('#form-edit select[name=jenis_kelamin]').html(elementJK);
    // console.table(data)
  // }  

  // DELETE DATA ALUMNI
  // function deleteData(nama_alumni, id_alumni) {
  //   let checkDelete = confirm('Apakah Anda ingin menghapus data "'+ nama_alumni+'" ?');
  //   $('#form-delete input[name=id_alumni]').val(id_alumni);
  //   if(checkDelete) {
  //     console.log('Berhasil dihapus');
  //     console.log($('#form-delete input[name=id_alumni]').val());
  //     $('#form-delete').submit();
  //   }
  // }

  // $(document).on('click','.btn-update-foto',function() {
  //   const data = {foto: $(this).data('foto')}
  //   $('.show-image').html('')
  //   $('.update-image').html('<input type="hidden" name="on_update" value="true" /><input type="file" name="foto" class="form-control" id="foto" /><button type="button" class="btn btn-danger btn-xs btn-update-foto-cancel" data-foto="'+data.foto+'" style="margin-top:0.75rem;">Batal</button>');
  // })

  // $(document).on('click','.btn-update-foto-cancel',function() {
  //   const data = {foto: $(this).data('foto')}
  //   $('.update-image').html('')
  //   $('.show-image').html('<input type="hidden" name="foto_old" value="'+data.foto+'" /><img src="<?= $baseUrl ?>/'+data.foto+'" alt="" srcset="" style="width:80px;height:80px;border-radius:999px;object-fit: cover;" /><button type="button" class="btn btn-primary btn-xs btn-update-foto" data-foto="'+data.foto+'" style="margin-left:0.75rem;">Update</button>');
  // })
  </script>
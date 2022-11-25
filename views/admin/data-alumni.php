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
// require_once('../config/+koneksi.php');
require_once('../models/m_alumni.php');

$connection = new Database($host, $user, $pass, $database);
$id_user = $_SESSION['id_user'];
$alumni = new Alumni($connection);
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
          <th>No. </th>
          <th>Nama alumni</th>
          <th>Foto</th>
          <th style="min-width: 100px;">tgl lahir</th>
          <th>Jenis kelamin</th>
          <th style="min-width: 200px;">Alamat</th>
          <th>tlpn</th>
          <th style="min-width: 100px;">tgl masuk</th>
          <th style="min-width: 100px;">tgl lulus</th>
          <th>SMP</th>
          <th>SMA/SMK</th>
          <th>Pekerjaan</th>
          <th style="min-width: 120px;">opsi</th>
        </tr>
           <?php

        $tampil = $alumni->tampil();
        $no = 0;
        while($data = $tampil->fetch_object()) {
          ?>
        <tr>
          <td><?php echo ++$no; ?></td>
          <td><?php echo $data->nama_alumni; ?></td>
          <td>
            <?= $data->foto ?>
            <?php if($data->foto): ?>
            <img src="<?= $baseUrl.'/'.$data->foto ?>" alt="" srcset="" style="width:80px;height:80px;border-radius:999px;object-fit: cover;" />
            <?php endif; ?>
          </td>
          <td><?php echo $data->tgl_lahir; ?></td>
          <td><?php echo $data->jenis_kelamin; ?></td>
          <td><?php echo $data->alamat; ?></td>
          <td><?php echo $data->tlp; ?></td>
          <td><?php echo $data->tgl_masuk; ?></td>
          <td><?php echo $data->tgl_lulus; ?></td>
          <td><?php echo $data->smp ?></td>
          <td><?php echo $data->sma_smk ?></td>
          <td><?php echo $data->pekerjaan ?></td>
          <td align="center"> 
              <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit" onclick="editData(<?= htmlspecialchars(json_encode($data)) ?>)"><i class="fa fa-edit"></i>edit</button>
              <button class="btn btn-danger btn-xs" onclick="deleteData('<?= htmlspecialchars($data->nama_alumni).'\',\''. htmlspecialchars($data->id_alumni) ?>')"><i class="fa fa-trash-o"></i>hapus</button>
          </td>
        </tr>
          <?php
          } ?>

       </table>
    </div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">Tambah data</button>

     <!-- MODAL TAMBAH -->
     <div id="modal-tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah Data Alumni</h4>
            </div>

            <form id="form-create" action="#" method="post" enctype="multipart/form-data">
              <div class="modal-body ">
                <div class="form-group">
                  <label class="control-label" for="id_alumni">Id Alumni</label>
                  <input type="text" name="id_alumni" class="form-control" id="id_alumni" value="<?= round(microtime(true)*1000) ?>" required="">
                </div>

                <div class="form-group">
                  <label class="control-label" for="nama_alumni">Nama Alumni</label>
                  <input type="text" name="nama_alumni" class="form-control" id="nama_alumni" required="">
                </div>

                <div class="form-group">
                  <label class="control-label" for="foto">Foto</label>
                  <input type="file" name="foto" class="form-control" id="foto">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required="">
                </div>                

                <div class="form-group">
                  <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                    <option selected disabled>-- Pilih jenis kelamin --</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat" required="">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tlp">Telepon</label>
                  <input type="number" name="tlp" class="form-control" id="tlp" required="">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Tanggal Masuk</label>
                  <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" required="">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">Tanggal Lulus</label>
                  <input type="date" name="tgl_lulus" class="form-control" id="tgl_lulus" required="">
                </div>

                <div class="form-group">
                  <label class="control-label" for="smp">SMP</label>
                  <input type="text" name="smp" class="form-control" id="smp" required="">
                </div>

                <div class="form-group">
                  <label class="control-label" for="sma_smk">SMA/SMK</label>
                  <input type="text" name="sma_smk" class="form-control" id="sma_smk" required="">
                </div>

                <div class="form-group">
                  <label class="control-label" for="pekerjaan">Pekerjaan</label>
                  <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required="">
                </div>

             </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- END MODAL TAMBAH -->

      <!-- MODAL EDIT -->
      <div id="modal-edit" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Alumni</h4>
              </div>
              <form action="#" method="POST" id="form-edit" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit">
                  <div class="form-group">
                    <label class="control-label" for="nama_alumni">Nama Alumni</label>
                    <input type="hidden" name="id_alumni" id="id_alumni">
                    <input type="text" name="nama_alumni" class="form-control" id="nama_alumni" required="">
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="foto">Foto</label>
                    <div class="show-image"></div>
                    <div class="update-image"></div>
                  </div>

                  <div class="form-group">
                    <label class="control-label" for="tgl_lahir">Tgl Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                      <!-- JS ACTION HERE -->
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="tlp">Telepon</label>
                    <input type="number" name="tlp" class="form-control" id="tlp" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="tgl_masuk">Tgl Masuk</label>
                    <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="tgl_lulus">Tgl Lulus</label>
                    <input type="date" name="tgl_lulus" class="form-control" id="tgl_lulus" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="smp">SMP</label>
                    <input type="text" name="smp" class="form-control" id="smp" required="">
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="sma_smk">SMA/SMK</label>
                    <input type="text" name="sma_smk" class="form-control" id="sma_smk" required="">
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="pekerjaan">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required="">
                  </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-success" name="editDataAlumni" value="Simpan">
                </div>
              </form>
            </div>
        </div>
      </div>
      <!-- END MODAL EDIT -->

      <!-- FORM DELETE -->
      <form id="form-delete" action="#" method="POST">
          <input type="hidden" name="id_alumni">
          <input type="hidden" name="deleteDataAlumni">
      </form>
      <!-- END FORM DELETE -->
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

      $alumni->edit($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jenis_kelamin, $alamat, $tlp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan);
      header("location: ?page=data-alumni");
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
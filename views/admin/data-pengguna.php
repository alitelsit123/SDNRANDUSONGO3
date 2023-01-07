<div class="row">
  <div class="col-lg-12">
    <h1>DATA<small> PENGGUNA</small></h1>
    <ol class="breadcrumb">
      <li><a href="../admin/index.php?page=dashboard"><i class="icon-dashboard"></i> Dashboard</a></li>
      <li class="active"><i class="icon-file-alt"></i> Data Pengguna</li>
    </ol>
  </div>
</div><!-- /.row -->

<?php
// require_once('../config/+koneksi.php');
require_once('../models/m_login.php');

$connection = new Database($host, $user, $pass, $database);
$id_user = $_SESSION['id_user'];
$user = new Login($connection);

if(isset($_POST['delete-akun'])) {
   $id_login = $_POST['id_login'];
   $user->hapus($id_login);
   header('location: ?page=data-pengguna&msg=success-hapus');
}

if(@$_GET['msg'] == 'success-hapus') {
   echo '<div class="alert alert-success margin-top-sm" role="alert">Data Pengguna Berhasil Dihapus</div>';
}
?>




<div class="row">
  <div class=" col-lg-12">

    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped">
        <tr>
          <th>No. </th>
          <th>E-mail</th>
          <th>Username</th>
          <th>Password</th>
          <th>Tipe</th>
          <th>Opsi</th>
        </tr>
           <?php

        $tampil = $user->tampil();
        $index = 0;
        while($data = $tampil->fetch_object()) {
          ?>
        <tr>
          <td><?php echo ++$index; ?></td>
          <td><?php echo $data->email; ?></td>
          <td><?php echo $data->username; ?></td>
          <td>
               <span id="<?= 'real-'.$data->id_login ?>" class="hidden"><?php echo $data->password; ?></span>
               <span id="<?= 'fake-'.$data->id_login ?>">*********</span>
          </td>
          <td><?php echo $data->type; ?></td>
          <td align="center"> 
              <button class="btn btn-warning btn-xs" onclick="showPassword(this)" data-fake="#<?= 'fake-'.$data->id_login ?>" data-real="#<?= 'real-'.$data->id_login ?>"><i class="fa fa-eye"></i></button>
              <?php if($data->type <> 'admin') {?>
              <button class="btn btn-danger btn-xs" onclick="deleteData('<?= htmlspecialchars($data->username).'\',\''. htmlspecialchars($data->id_login) ?>')"><i class="fa fa-trash-o"></i> hapus</button>
              <?php } ?>
          </td>
        </tr>
          <?php
          } ?>

       </table>
    </div>

  </div>
</div>

<!-- FORM DELETE -->
<form id="form-delete" action="#" method="POST">
   <input type="hidden" name="id_login">
   <input type="hidden" name="delete-akun">
</form>

<script type="text/javascript">
   function deleteData(user, id) {
      let check = confirm(`Apakah Anda ingin menghapus '${user}' ?`);

      if(check) {
         $('#form-delete input[name=id_login]').val(id);
         $('#form-delete').submit();
      }
   }

   function showPassword(elm) {
      if($($(elm).data('real')).hasClass('hidden')) {
         $($(elm).data('real')).removeClass('hidden');
         $($(elm).data('fake')).addClass('hidden');
      } else {
         $($(elm).data('fake')).removeClass('hidden');
         $($(elm).data('real')).addClass('hidden');
      }
   }
</script>
<?php 
require_once('../models/m_pengantarkepsek.php');
$pengantar = new Pengantar($connection);
$tampil = $pengantar->tampil()->fetch_object();
if(isset($_POST['simpan-pengantar'])) {
   $id_pengantar = $_POST['id_pengantar'];
   $desc_pengantar = htmlspecialchars(addslashes($_POST['desc_pengantar']));
   $picture_kepsek = $_FILES['picture_kepsek'];
   $pict_old = $_POST['pict_old'];
   $pict_filename = '';
   $uploadOk = 1;
   $msg = '';

   // IMAGE UPLOAD
   if($picture_kepsek['name'] == '') {
      $pict_filename = $pict_old;
      $uploadOk = 1;
   } else {
      $imageFileType = strtolower(pathinfo(basename($picture_kepsek['name']), PATHINFO_EXTENSION));
      $pict_filename = 'foto_kepsek_'.date('YmdHis').'.'.$imageFileType;
      $check = getimagesize($picture_kepsek['tmp_name']);
      if($check !== false) {
         $uploadOk = 1;
      } else {
         $msg = 'error check';
         $uploadOk = 0;
      }

      if($picture_kepsek['size'] > 2000000) {
         $msg = 'error size';
         $uploadOk = 0;
      }

      if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
         $msg = 'error extension';
         $uploadOk = 0;
      }

      if($uploadOk == 0) {
         echo $msg;
      } else {
         unlink('../images/image_profil/'.$pict_old);
         if(!move_uploaded_file($picture_kepsek['tmp_name'], '../images/image_profil/'.$pict_filename)) { 
            echo "error upload image file";       
         }
      }
   }
   // END IMAGE UPLOAD

   if($uploadOk == 1) {
      $pengantar->edit($id_pengantar, $desc_pengantar, $pict_filename);
      header('location: ?page=pengantar-kepsek&alert_msg=success');
   } else {
      header('location: ?page=pengantar-kepsek&alert_msg=fail');
   }
}
?>

<?php
   if(@$_GET['alert_msg'] == 'success') {
      echo '<div class="alert alert-success margin-top-sm" role="alert">Pengantar Berhasil Diubah</div>';
   }
   if(@$_GET['alert_msg'] == 'fail') {
      echo '<div class="alert alert-danger margin-top-sm" role="alert">Pengantar Gagal Diubah</div>';
   }
?>

<form action="#" method="POST" enctype="multipart/form-data">
   <div class="form-group">
      <label for="text_summernote">Deskripsi Pengantar</label>
      <textarea name="desc_pengantar" id="text_summernote" class="form-control" rows="5" required><?= htmlspecialchars_decode($tampil->deskripsi_pengantar) ?></textarea>
      <input type="hidden" name="id_pengantar" value="<?= $tampil->id_pengantar ?>">
   </div>
   <div class="form-group">
      <label for="picture_kepsek">Kepala Sekolah</label>
      <img src="../images/image_profil/<?= $tampil->gambar ?>" class="img-responsive margin-bottom-md" style="max-width: 300px" alt="foto-kepsek">
      <input type="hidden" name="pict_old" value="<?= $tampil->gambar ?>">
      <input type="file" name="picture_kepsek" id="picture_kepsek">
      <p class="help-block">▪️ Tipe yang diizinkan .jpg/.jpeg/.png/</p>
      <p class="help-block">▪️ Maksimal ukuran 2MB</p>
   </div>
   <button type="submit" name="simpan-pengantar" class="btn btn-primary">Simpan</button>
</form>

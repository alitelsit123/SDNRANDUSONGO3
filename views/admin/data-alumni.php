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
          <!-- <th>Foto</th> -->
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
          <!-- <td>
            <?php if($data->foto): ?>
            <img src="<?= $baseUrl.'/'.$data->foto ?>" alt="" srcset="" style="width:80px;height:80px;border-radius:999px;object-fit: cover;" />
            <?php endif; ?>
          </td> -->
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
              <div style="width:200px">
                <!-- <a href="<?= $baseUrl.'/admin/index.php?page=data-nilai&siswa='.$data->nama_alumni ?>" class="btn btn-primary btn-xs">Lihat Nilai</a>
                <a target="_blank" href="<?= $baseUrl.'/admin/raport.php?&siswa='.$data->nama_alumni ?>" class="btn btn-primary btn-xs">Lihat Raport</a> -->
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-edit" onclick="editData(<?= htmlspecialchars(json_encode($data)) ?>)"><i class="fa fa-edit"></i>edit</button>
                <button class="btn btn-danger btn-xs" onclick="deleteData('<?= htmlspecialchars($data->nama_alumni).'\',\''. htmlspecialchars($data->id_alumni) ?>')"><i class="fa fa-trash-o"></i>hapus</button>
              </div>
          </td>
        </tr>
          <?php
          } ?>

       </table>
    </div>
    <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah">Tambah data</button> -->

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
                  <label class="control-label" for="id_alumni">NISN</label>
                  <input type="text" name="nisn" class="form-control" id="id_alumni" value="<?= round(microtime(true)*1000) ?>" required="">
                </div>
                <div class="form-group">
                  <label class="control-label" for="id_alumni">Nomor Induk Peserta Didik</label>
                  <input type="text" name="id_alumni" class="form-control" id="id_alumni" value="<?= round(microtime(true)*1000) ?>" required="">
                </div>

                <div class="form-group">
                  <label class="control-label" for="nama_alumni">Nama Alumni</label>
                  <input type="text" name="nama_alumni" class="form-control" id="nama_alumni" required="">
                </div>

                <!-- <div class="form-group">
                  <label class="control-label" for="foto">Foto</label>
                  <input type="file" name="foto" class="form-control" id="foto">
                </div> -->

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
                  <label class="control-label" for="alamat">Agama</label>
                  <input type="text" name="agama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Anak Ke Berapa</label>
                  <input type="text" name="anak_keberapa" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Jumlah Saudara Kandung</label>
                  <input type="text" name="jml_saudara_kandung" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Jumlah Saudara Tiri</label>
                  <input type="text" name="jml_saudara_tiri" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Jumlah Saudara Angkat</label>
                  <input type="text" name="jml_saudara_angkat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Anak yatim / piatu / yatim piatu</label>
                  <input type="text" name="type_anak" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Bahasa sehari hari dirumah</label>
                  <input type="text" name="bahasa" class="form-control" id="alamat">
                </div>



                <div class="form-group">
                  <label class="control-label" for="alamat">Kewarganegaraan</label>
                  <input type="text" name="kewarganegaraan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tlp">Telepon</label>
                  <input type="number" name="tlp" class="form-control" id="tlp">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tinggal Dengan Orangtua / Saudara / Di Asrama / Kost</label>
                  <input type="text" name="jarak" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Jarak Kesekolah</label>
                  <input type="text" name="jarak" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Golongan Darah</label>
                  <input type="text" name="golongan_darah" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Penyakit Yang Pernah Diderita</label>
                  <input type="text" name="penyakit_diderita" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tinggi dan Berat Badan</label>
                  <input type="text" name="tb_bb" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tamatan Dari</label>
                  <input type="text" name="tamatan_dari" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tanggal dan Nomor Ijazah</label>
                  <input type="text" name="tamatan_tanggal_no_ijazah" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tanggal dan Nomor STL/SKHUN</label>
                  <input type="text" name="tamatan_tanggal_no_skhun" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pindahan</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Dari Sekolah</label>
                  <input type="text" name="pindahan_dari" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alasan</label>
                  <input type="text" name="pindahan_alasan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Diterima di sekolah ini</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tingkat</label>
                  <input type="text" name="diterima_tingkat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Bidang Keahlian</label>
                  <input type="text" name="diterima_bidang" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Program Keahlian</label>
                  <input type="text" name="diterima_program" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tanggal</label>
                  <input type="date" name="diterima_tanggal" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">KETERANGAN TENTANG AYAH KANDUNG</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Nama</label>
                  <input type="text" name="ayah_nama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat</label>
                  <input type="text" name="ayah_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Agama</label>
                  <input type="text" name="ayah_agama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Kewarganegaraan</label>
                  <input type="text" name="ayah_kewarganegaraan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pendidikan</label>
                  <input type="text" name="ayah_pendidikan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pekerjaan</label>
                  <input type="text" name="ayah_pekerjaan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pengeluaran perbulan</label>
                  <input type="text" name="ayah_pengeluaran" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat Rumah / Nomor Telp / HP</label>
                  <input type="text" name="ayah_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Masih Hidup / Meninggal Dunia</label>
                  <input type="text" name="ayah_hidup" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">KETERANGAN TENTANG IBU KANDUNG</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Nama</label>
                  <input type="text" name="ibu_nama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat</label>
                  <input type="text" name="ibu_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Agama</label>
                  <input type="text" name="ibu_agama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Kewarganegaraan</label>
                  <input type="text" name="ibu_kewarganegaraan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pendidikan</label>
                  <input type="text" name="ibu_pendidikan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pekerjaan</label>
                  <input type="text" name="ibu_pekerjaan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pengeluaran perbulan</label>
                  <input type="text" name="ibu_pengeluaran" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat Rumah / Nomor Telp / HP</label>
                  <input type="text" name="ibu_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Masih Hidup / Meninggal Dunia</label>
                  <input type="text" name="ibu_hidup" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">KETERANGAN TENTANG WALI</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Nama</label>
                  <input type="text" name="wali_nama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat</label>
                  <input type="text" name="wali_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Agama</label>
                  <input type="text" name="wali_agama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Kewarganegaraan</label>
                  <input type="text" name="wali_kewarganegaraan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pendidikan</label>
                  <input type="text" name="wali_pendidikan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pekerjaan</label>
                  <input type="text" name="wali_pekerjaan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pengeluaran perbulan</label>
                  <input type="text" name="wali_pengeluaran" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat Rumah / Nomor Telp / HP</label>
                  <input type="text" name="wali_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Kegemaran</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Input Kegemaran</label>
                  <input type="text" name="kegemaran" class="form-control" id="kegemaran">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">KETERANGAN PERKEMBANGAN PESERTA DIDIK</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Beasiswa</label>
                  <input type="text" name="beasiswa" class="form-control" id="beasiswa">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Meninggalkan Sekolah Ini</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Tanggal Meninggalkan Sekolah</label>
                  <input type="text" name="meninggalkan_tanggal" class="form-control" id="tgl_masuk">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Alasan</label>
                  <input type="text" name="meninggalkan_alasan" class="form-control" id="tgl_masuk">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Akhir Pendidikan</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Tanggal Masuk</label>
                  <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">Tanggal Lulus</label>
                  <input type="date" name="tgl_lulus" class="form-control" id="tgl_lulus">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">Ijazah</label>
                  <input type="text" name="akhir_ijazah" class="form-control" id="tgl_lulus">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">Nomor Surat Tanda Lulus / STL</label>
                  <input type="text" name="akhir_nomor_surat" class="form-control" id="tgl_lulus">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">Nilai rata-rata yang dicapai</label>
                  <input type="text" name="akhir_nilai_ratarata" class="form-control" id="tgl_lulus">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">KETERANGAN SETELAH SELESAI PENDIDIKAN</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="smp">SMP</label>
                  <input type="text" name="smp" class="form-control" id="smp">
                </div>

                <div class="form-group">
                  <label class="control-label" for="sma_smk">SMA/SMK</label>
                  <input type="text" name="sma_smk" class="form-control" id="sma_smk">
                </div>

                <div class="form-group">
                  <label class="control-label" for="pekerjaan">Pekerjaan</label>
                  <input type="text" name="pekerjaan" class="form-control" id="pekerjaan">
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
                  <label class="control-label" for="id_alumni">NISN</label>
                  <input type="text" name="nisn" class="form-control" id="id_alumni" value="<?= round(microtime(true)*1000) ?>" required="">
                </div>
                <!-- <div class="form-group">
                  <label class="control-label" for="id_alumni">Nomor Induk Peserta Didik</label>
                  <input type="text" name="id_alumni" class="form-control" id="id_alumni" value="<?= round(microtime(true)*1000) ?>" required="">
                </div> -->

                <div class="form-group">
                  <label class="control-label" for="nama_alumni">Nama Alumni</label>
                  <input type="text" name="nama_alumni" class="form-control" id="nama_alumni" required="" title="TIDAK BISA DI UPDATE!!!!">
                </div>

                <!-- <div class="form-group">
                  <label class="control-label" for="foto">Foto</label>
                  <div class="show-image"></div>
                  <div class="update-image"></div>
                </div> -->

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

                <!-- <div class="form-group">
                  <label class="control-label" for="alamat">Agama</label>
                  <input type="text" name="agama" class="form-control" id="alamat">
                </div> -->

                <div class="form-group">
                  <label class="control-label" for="tlp">Telepon</label>
                  <input type="number" name="tlp" class="form-control" id="tlp">
                </div>
                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat">
                </div>
                <div class="form-group">
                  <label class="control-label" for="alamat">Diterima Tanggal</label>
                  <input type="date" name="tgl_masuk" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">Lulus Tanggal</label>
                  <input type="date" name="tgl_lulus" class="form-control" id="tgl_lulus">
                </div>

                <!-- <div class="form-group">
                  <label class="control-label" for="alamat">Anak Ke Berapa</label>
                  <input type="text" name="anak_keberapa" class="form-control" id="alamat">
                </div> -->

                <!-- <div class="form-group">
                  <label class="control-label" for="alamat">Jumlah Saudara Kandung</label>
                  <input type="text" name="jml_saudara_kandung" class="form-control" id="alamat">
                </div> -->

                <!-- <div class="form-group">
                  <label class="control-label" for="alamat">Jumlah Saudara Tiri</label>
                  <input type="text" name="jml_saudara_tiri" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Jumlah Saudara Angkat</label>
                  <input type="text" name="jml_saudara_angkat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Anak yatim / piatu / yatim piatu</label>
                  <input type="text" name="type_anak" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Bahasa sehari hari dirumah</label>
                  <input type="text" name="bahasa" class="form-control" id="alamat">
                </div>



                <div class="form-group">
                  <label class="control-label" for="alamat">Kewarganegaraan</label>
                  <input type="text" name="kewarganegaraan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tinggal Dengan Orangtua / Saudara / Di Asrama / Kost</label>
                  <input type="text" name="jarak" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Jarak Kesekolah</label>
                  <input type="text" name="jarak" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Golongan Darah</label>
                  <input type="text" name="golongan_darah" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Penyakit Yang Pernah Diderita</label>
                  <input type="text" name="penyakit_diderita" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tinggi dan Berat Badan</label>
                  <input type="text" name="tb_bb" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tamatan Dari</label>
                  <input type="text" name="tamatan_dari" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tanggal dan Nomor Ijazah</label>
                  <input type="text" name="tamatan_tanggal_no_ijazah" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tanggal dan Nomor STL/SKHUN</label>
                  <input type="text" name="tamatan_tanggal_no_skhun" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pindahan</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Dari Sekolah</label>
                  <input type="text" name="pindahan_dari" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alasan</label>
                  <input type="text" name="pindahan_alasan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Diterima di sekolah ini</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Tingkat</label>
                  <input type="text" name="diterima_tingkat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Bidang Keahlian</label>
                  <input type="text" name="diterima_bidang" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Program Keahlian</label>
                  <input type="text" name="diterima_program" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">KETERANGAN TENTANG AYAH KANDUNG</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Nama</label>
                  <input type="text" name="ayah_nama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat</label>
                  <input type="text" name="ayah_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Agama</label>
                  <input type="text" name="ayah_agama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Kewarganegaraan</label>
                  <input type="text" name="ayah_kewarganegaraan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pendidikan</label>
                  <input type="text" name="ayah_pendidikan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pekerjaan</label>
                  <input type="text" name="ayah_pekerjaan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pengeluaran perbulan</label>
                  <input type="text" name="ayah_pengeluaran" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat Rumah / Nomor Telp / HP</label>
                  <input type="text" name="ayah_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Masih Hidup / Meninggal Dunia</label>
                  <input type="text" name="ayah_hidup" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">KETERANGAN TENTANG IBU KANDUNG</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Nama</label>
                  <input type="text" name="ibu_nama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat</label>
                  <input type="text" name="ibu_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Agama</label>
                  <input type="text" name="ibu_agama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Kewarganegaraan</label>
                  <input type="text" name="ibu_kewarganegaraan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pendidikan</label>
                  <input type="text" name="ibu_pendidikan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pekerjaan</label>
                  <input type="text" name="ibu_pekerjaan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pengeluaran perbulan</label>
                  <input type="text" name="ibu_pengeluaran" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat Rumah / Nomor Telp / HP</label>
                  <input type="text" name="ibu_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Masih Hidup / Meninggal Dunia</label>
                  <input type="text" name="ibu_hidup" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">KETERANGAN TENTANG WALI</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Nama</label>
                  <input type="text" name="wali_nama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat</label>
                  <input type="text" name="wali_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Agama</label>
                  <input type="text" name="wali_agama" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Kewarganegaraan</label>
                  <input type="text" name="wali_kewarganegaraan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pendidikan</label>
                  <input type="text" name="wali_pendidikan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pekerjaan</label>
                  <input type="text" name="wali_pekerjaan" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Pengeluaran perbulan</label>
                  <input type="text" name="wali_pengeluaran" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="alamat">Alamat Rumah / Nomor Telp / HP</label>
                  <input type="text" name="wali_alamat" class="form-control" id="alamat">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Kegemaran</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Input Kegemaran</label>
                  <input type="text" name="kegemaran" class="form-control" id="kegemaran">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">KETERANGAN PERKEMBANGAN PESERTA DIDIK</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Beasiswa</label>
                  <input type="text" name="beasiswa" class="form-control" id="beasiswa">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Meninggalkan Sekolah Ini</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Tanggal Meninggalkan Sekolah</label>
                  <input type="text" name="meninggalkan_tanggal" class="form-control" id="tgl_masuk">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Alasan</label>
                  <input type="text" name="meninggalkan_alasan" class="form-control" id="tgl_masuk">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Akhir Pendidikan</label>
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_masuk">Tanggal Masuk</label>
                  <input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">Ijazah</label>
                  <input type="text" name="akhir_ijazah" class="form-control" id="tgl_lulus">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">Nomor Surat Tanda Lulus / STL</label>
                  <input type="text" name="akhir_nomor_surat" class="form-control" id="tgl_lulus">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">Nilai rata-rata yang dicapai</label>
                  <input type="text" name="akhir_nilai_ratarata" class="form-control" id="tgl_lulus">
                </div>

                <div class="form-group">
                  <label class="control-label" for="tgl_lulus">KETERANGAN SETELAH SELESAI PENDIDIKAN</label>
                </div> -->

                <div class="form-group">
                  <label class="control-label" for="smp">SMP</label>
                  <input type="text" name="smp" class="form-control" id="smp">
                </div>

                <div class="form-group">
                  <label class="control-label" for="sma_smk">SMA/SMK</label>
                  <input type="text" name="sma_smk" class="form-control" id="sma_smk">
                </div>

                <div class="form-group">
                  <label class="control-label" for="pekerjaan">Pekerjaan</label>
                  <input type="text" name="pekerjaan" class="form-control" id="pekerjaan">
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
      $id_alumni = $connection->conn->real_escape_string($_POST['nisn']);
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

      $tt = $alumni->edit($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jenis_kelamin, $alamat, $tlp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan);
      // var_dump(mysqli_error($connection->getConnection()));
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

    $('#form-edit input[name=agama]').val(data.agama)
    $('#form-edit input[name=kewarganegaraan]').val(data.kewarganegaraan)
    $('#form-edit input[name=anak_keberapa]').val(data.anak_keberapa)
    $('#form-edit input[name=jml_saudara_kandung]').val(data.jml_saudara_kandung)
    $('#form-edit input[name=jml_saudara_tiri]').val(data.jml_saudara_tiri)
    $('#form-edit input[name=jml_saudara_angkat]').val(data.jml_saudara_angkat)
    $('#form-edit input[name=type_anak]').val(data.type_anak)
    $('#form-edit input[name=bahasa]').val(data.bahasa)
    $('#form-edit input[name=tinggal_dengan]').val(data.tinggal_dengan)
    $('#form-edit input[name=jarak]').val(data.jarak)
    $('#form-edit input[name=golongan_darah]').val(data.golongan_darah)
    $('#form-edit input[name=penyakit_diderita]').val(data.penyakit_diderita)
    $('#form-edit input[name=tb_bb]').val(data.tb_bb)
    $('#form-edit input[name=tamatan_dari]').val(data.tamatan_dari)
    $('#form-edit input[name=tamatan_tanggal_no_ijazah]').val(data.tamatan_tanggal_no_ijazah)
    $('#form-edit input[name=tamatan_no_skhun]').val(data.tamatan_no_skhun)
    $('#form-edit input[name=tamatan_lama_belajar]').val(data.tamatan_lama_belajar)
    $('#form-edit input[name=pindahan_dari]').val(data.pindahan_dari)
    $('#form-edit input[name=pindahan_alasan]').val(data.pindahan_alasan)
    $('#form-edit input[name=diterima_tingkat]').val(data.diterima_tingkat)
    $('#form-edit input[name=ayah_nama]').val(data.ayah_nama)
    $('#form-edit input[name=ayah_tanggal_lahir]').val(data.ayah_tanggal_lahir)
    $('#form-edit input[name=ayah_agama]').val(data.ayah_agama)
    $('#form-edit input[name=ayah_kewarganegaraan]').val(data.ayah_kewarganegaraan)
    $('#form-edit input[name=ayah_pengeluaran]').val(data.ayah_pengeluaran)
    $('#form-edit input[name=ayah_alamat]').val(data.ayah_alamat)
    $('#form-edit input[name=ayah_hidup]').val(data.ayah_hidup)
    $('#form-edit input[name=ibu_nama]').val(data.ibu_nama)
    $('#form-edit input[name=ibu_tanggal_lahir]').val(data.ibu_tanggal_lahir)
    $('#form-edit input[name=ibu_agama]').val(data.ibu_agama)
    $('#form-edit input[name=ibu_kewarganegaraan]').val(data.ibu_kewarganegaraan)
    $('#form-edit input[name=ibu_pengeluaran]').val(data.ibu_pengeluaran)
    $('#form-edit input[name=ibu_alamat]').val(data.ibu_alamat)
    $('#form-edit input[name=ibu_hidup]').val(data.ibu_hidup)
    $('#form-edit input[name=wali_nama]').val(data.wali_nama)
    $('#form-edit input[name=wali_tanggal_lahir]').val(data.wali_tanggal_lahir)
    $('#form-edit input[name=wali_agama]').val(data.wali_agama)
    $('#form-edit input[name=wali_kewarganegaraan]').val(data.wali_kewarganegaraan)
    $('#form-edit input[name=wali_pengeluaran]').val(data.wali_pengeluaran)
    $('#form-edit input[name=wali_alamat]').val(data.wali_alamat)
    $('#form-edit input[name=kegemaran]').val(data.kegemaran)
    $('#form-edit input[name=beasiswa]').val(data.beasiswa)
    $('#form-edit input[name=meninggalkan_tanggal]').val(data.meninggalkan_tanggal)
    $('#form-edit input[name=meninggalkan_alasan]').val(data.meninggalkan_alasan)
    $('#form-edit input[name=akhir_ijazah]').val(data.akhir_ijazah)
    $('#form-edit input[name=akhir_nomor_surat]').val(data.akhir_nomor_surat)
    $('#form-edit input[name=akhir_nilai_ratarata]').val(data.akhir_nilai_ratarata)
    $('#form-edit input[name=nisn]').val(data.nisn)


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
<?php
class Alumni{

     private $mysqli;

     function __construct($conn) {
     	$this->mysqli = $conn;
     }
     public function tampil($id_alumni = null, $id_login = null) {
     	$db = $this->mysqli->conn;
     	$sql = "SELECT * FROM alumni";
     	if($id_alumni != null) {
     		$sql .= " WHERE id_alumni = $id_alumni";
     	}
     	if($id_login != null) {
     		$sql .= " WHERE id_login = $id_login";
     	}
      $sql .= " ORDER BY id_alumni desc";
     	$query = $db->query($sql) or die ($db->error);
     	return $query;
     }

     public function tambah($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jenis_kelamin, $alamat, $tlp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan) {
      $filename = '';
      if (isset($_FILES["foto"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $filename = $target_dir.$id_alumni.time().uniqid().uniqid().'.'.$imageFileType;
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
          move_uploaded_file($_FILES["foto"]["tmp_name"],__DIR__.'/../'.$filename);
        } else {
          $filename = '';
        }
      }

      $db = $this->mysqli->conn;
     	$db->query("INSERT INTO alumni VALUES('$id_alumni', '$id_user', '$nama_alumni', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$tlp', '$tgl_masuk', '$tgl_lulus', '$smp', '$sma_smk', '$pekerjaan', '$filename',
      '".$_POST['agama']."',
      '".$_POST['kewarganegaraan']."',
      '".$_POST['anak_keberapa']."',
      '".$_POST['jml_saudara_kandung']."',
      '".$_POST['jml_saudara_tiri']."',
      '".$_POST['jml_saudara_angkat']."',
      '".$_POST['type_anak']."',
      '".$_POST['bahasa']."',
      '".$_POST['tinggal_dengan']."',
      '".$_POST['jarak']."',
      '".$_POST['golongan_darah']."',
      '".$_POST['penyakit_diderita']."',
      '".$_POST['kelainan_jasmani']."',
      '".$_POST['tb_bb']."',
      '".$_POST['tamatan_dari']."',
      '".$_POST['tamatan_tanggal_no_ijazah']."',
      '".$_POST['tamatan_tanggal_no_skhun']."',
      '".$_POST['tamatan_lama_belajar']."',
      '".$_POST['pindahan_dari']."',
      '".$_POST['pindahan_alasan']."',
      '".$_POST['diterima_tingkat']."',
      '".$_POST['diterima_bidang']."',
      '".$_POST['diterima_program']."',
      '".$_POST['diterima_tanggal']."',
      '".$_POST['ayah_nama']."',
      '".$_POST['ayah_tanggal_lahir']."',
      '".$_POST['ayah_agama']."',
      '".$_POST['ayah_kewarganegaraan']."',
      '".$_POST['ayah_pendidikan']."',
      '".$_POST['ayah_pekerjaan']."',
      '".$_POST['ayah_pengeluaran']."',
      '".$_POST['ayah_alamat']."',
      '".$_POST['ayah_hidup']."',
      '".$_POST['ibu_nama']."',
      '".$_POST['ibu_tanggal_lahir']."',
      '".$_POST['ibu_agama']."',
      '".$_POST['ibu_kewarganegaraan']."',
      '".$_POST['ibu_pendidikan']."',
      '".$_POST['ibu_pekerjaan']."',
      '".$_POST['ibu_pengeluaran']."',
      '".$_POST['ibu_alamat']."',
      '".$_POST['ibu_hidup']."',
      '".$_POST['wali_nama']."',
      '".$_POST['wali_tanggal_lahir']."',
      '".$_POST['wali_agama']."',
      '".$_POST['wali_kewarganegaraan']."',
      '".$_POST['wali_pendidikan']."',
      '".$_POST['wali_pekerjaan']."',
      '".$_POST['wali_pengeluaran']."',
      '".$_POST['wali_alamat']."',
      '".$_POST['kegemaran']."',
      '".$_POST['beasiswa']."',
      '".$_POST['meninggalkan_tanggal']."',
      '".$_POST['meninggalkan_alasan']."',
      '',
      '".$_POST['akhir_ijazah']."',
      '".$_POST['akhir_nomor_surat']."',
      '".$_POST['akhir_nilai_ratarata']."',
      '".$_POST['nisn']."'
      )") or die($db->error);
             
     }


     public function edit($id_alumni, $id_user, $nama_alumni, $tgl_lahir, $jenis_kelamin, $alamat, $tlp, $tgl_masuk, $tgl_lulus, $smp, $sma_smk, $pekerjaan) {
        $filename = '';
        if (isset($_FILES["foto"])) {
          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["foto"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $filename = $target_dir.$id_alumni.time().uniqid().uniqid().'.'.$imageFileType;
          $check = getimagesize($_FILES["foto"]["tmp_name"]);
          if($check !== false) {
            move_uploaded_file($_FILES["foto"]["tmp_name"],__DIR__.'/../'.$filename);
          } else {
            $filename = '';
          }
        } else {
          if (isset($_POST['foto_old'])) {
            $filename = $_POST['foto_old'];
          }
        }
        $db = $this->mysqli->conn;
        return $db->query("UPDATE alumni SET id_login = '$id_user',nama_alumni = '$nama_alumni', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', tlp = '$tlp', tgl_masuk = '$tgl_masuk', tgl_lulus = '$tgl_lulus', smp = '$smp', sma_smk = '$sma_smk', pekerjaan = '$pekerjaan', foto = '$filename', 
        agama='".($_POST['agama'] ?? '')."',
        kewarganegaraan='".($_POST['kewarganegaraan'] ?? '')."',
        anak_keberapa='".($_POST['anak_keberapa'] ?? '')."',
        jml_saudara_kandung='".($_POST['jml_saudara_kandung'] ?? '')."',
        jml_saudara_tiri='".($_POST['jml_saudara_tiri'] ?? '')."',
        jml_saudara_angkat='".($_POST['jml_saudara_angkat'] ?? '')."',
        type_anak='".($_POST['type_anak'] ?? '')."',
        bahasa='".($_POST['bahasa'] ?? '')."',
        tinggal_dengan='".($_POST['tinggal_dengan'] ?? '')."',
        jarak='".($_POST['jarak'] ?? '')."',
        golongan_darah='".($_POST['golongan_darah'] ?? '')."',
        penyakit_diderita='".($_POST['penyakit_diderita'] ?? '')."',
        kelainan_jasmani='".($_POST['kelainan_jasmani'] ?? '')."',
        tb_bb='".($_POST['tb_bb'] ?? '')."',
        tamatan_dari='".($_POST['tamatan_dari'] ?? '')."',
        tamatan_tanggal_no_ijazah='".($_POST['tamatan_tanggal_no_ijazah'] ?? '')."',
        tamatan_tanggal_no_skhun='".($_POST['tamatan_tanggal_no_skhun'] ?? '')."',
        tamatan_lama_belajar='".($_POST['tamatan_lama_belajar'] ?? '')."',
        pindahan_dari='".($_POST['pindahan_dari'] ?? '')."',
        pindahan_alasan='".($_POST['pindahan_alasan'] ?? '')."',
        diterima_tingkat='".($_POST['diterima_tingkat'] ?? '')."',
        diterima_bidang='".($_POST['diterima_bidang'] ?? '')."',
        diterima_program='".($_POST['diterima_program'] ?? '')."',
        diterima_tanggal='".($_POST['diterima_tanggal'] ?? '')."',
        ayah_nama='".($_POST['ayah_nama'] ?? '')."',
        ayah_tanggal_lahir='".($_POST['ayah_tanggal_lahir'] ?? '')."',
        ayah_agama='".($_POST['ayah_agama'] ?? '')."',
        ayah_kewarganegaraan='".($_POST['ayah_kewarganegaraan'] ?? '')."',
        ayah_pendidikan='".($_POST['ayah_pendidikan'] ?? '')."',
        ayah_pekerjaan='".($_POST['ayah_pekerjaan'] ?? '')."',
        ayah_pengeluaran='".($_POST['ayah_pengeluaran'] ?? '')."',
        ayah_alamat='".($_POST['ayah_alamat'] ?? '')."',
        ayah_hidup='".($_POST['ayah_hidup'] ?? '')."',
        ibu_nama='".($_POST['ibu_nama'] ?? '')."',
        ibu_tanggal_lahir='".($_POST['ibu_tanggal_lahir'] ?? '')."',
        ibu_agama='".($_POST['ibu_agama'] ?? '')."',
        ibu_kewarganegaraan='".($_POST['ibu_kewarganegaraan'] ?? '')."',
        ibu_pendidikan='".($_POST['ibu_pendidikan'] ?? '')."',
        ibu_pekerjaan='".($_POST['ibu_pekerjaan'] ?? '')."',
        ibu_pengeluaran='".($_POST['ibu_pengeluaran'] ?? '')."',
        ibu_alamat='".($_POST['ibu_alamat'] ?? '')."',
        ibu_hidup='".($_POST['ibu_hidup'] ?? '')."',
        wali_nama='".($_POST['wali_nama'] ?? '')."',
        wali_tanggal_lahir='".($_POST['wali_tanggal_lahir'] ?? '')."',
        wali_agama='".($_POST['wali_agama'] ?? '')."',
        wali_kewarganegaraan='".($_POST['wali_kewarganegaraan'] ?? '')."',
        wali_pendidikan='".($_POST['wali_pendidikan'] ?? '')."',
        wali_pekerjaan='".($_POST['wali_pekerjaan'] ?? '')."',
        wali_pengeluaran='".($_POST['wali_pengeluaran'] ?? '')."',
        wali_alamat='".($_POST['wali_alamat'] ?? '')."',
        kegemaran='".($_POST['kegemaran'] ?? '')."',
        beasiswa='".($_POST['beasiswa'] ?? '')."',
        meninggalkan_tanggal='".($_POST['meninggalkan_tanggal'] ?? '')."',
        meninggalkan_alasan='".($_POST['meninggalkan_alasan'] ?? '')."',
        akhir_tanggal='',
        akhir_ijazah='".($_POST['akhir_ijazah'] ?? '')."',
        akhir_nomor_surat='".($_POST['akhir_nomor_surat'] ?? '')."',
        akhir_nilai_ratarata='".($_POST['akhir_nilai_ratarata'] ?? '')."',
        nisn='".($_POST['nisn'] ?? '')."'
        WHERE nisn = '$id_alumni'") or die ($db->error);
     }

     public function hapus($id){
        $db = $this->mysqli->conn;
        $db->query("DELETE FROM alumni WHERE id_alumni = '$id' ") or die ($db->error); 
     }

     public function get($query) {
      $result = [];
      while($data = $query->fetch_object()) {
        $result[] = $data;
      }

      return $result;
     }

     public function filter($data) {
      $db = $this->mysqli->conn;
      $filters = [];
      foreach ($data as $key => $value) {
        $filters = $key.'='.'"'.$value.'"';
      }
      $resultQuery = implode(' AND ', $filters);
      $db->query("SELECT * FROM alumni WHERE $resultQuery") or die ($db->error); 
     }

     public function filterOne($data) {
      $db = $this->mysqli->conn;
      $filters = [];
      foreach ($data as $key => $value) {
        $filters[] = $key.'='.'"'.$value.'"';
      }
      $resultQuery = implode(' AND ', $filters);
      $q = $db->query("SELECT * FROM alumni WHERE $resultQuery LIMIT 1") or die ($db->error); 
      $result = null;
      while($datas = $q->fetch_object()) {
        $result = $datas;
      }
      return $result;
      }

}
?> 

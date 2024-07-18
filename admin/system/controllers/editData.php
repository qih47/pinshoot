<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';

if (isset($_GET['sesi'])) {
  $sesi = $_GET['sesi'];
// echo $sesi;
// die();
  if ($sesi == "akses") {
    if (isset($_POST['idakses'], $_POST['loker'], $_POST['norf'])) {
      $idAkses = $_POST['idakses'];
      $idLocker = $_POST['loker'];
      $norfid = $_POST['norf'];

      $insertAkses = $database->updateAksesPersonil($idAkses, $idLocker, $norfid);
      if ($insertAkses) {
        echo "sukses";
      } else {
        echo "error";
      }
    } else {
      echo "error";
    }
  } else if ($sesi == "personil") {
    if (isset($_POST['idpersonil'], $_POST['nama'], $_POST['npp'], $_POST['divisi'], $_POST['lokasi'])) {
      $idPersonil = $_POST['idpersonil'];
      $nama = $_POST['nama'];
      $npp = $_POST['npp'];
      $divisi = $_POST['divisi'];
      $lokasi = $_POST['lokasi'];
      $insertPersonil = $database->updateDataPersonil($idPersonil, $nama, $npp, $divisi, $lokasi);
      if ($insertPersonil) {
        echo "sukses";
      } else {
        echo "error";
      }
      // echo $idPersonil, $nama, $npp, $divisi, $lokasi;
      // die();
    } else {
      echo "error";
    }
  }else if($sesi == "user"){
    if ($_POST['password'] == $_POST['verpassword']) {
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    } else {
      header("Location: ../../pages/controllers/index/hal.php?i=pages10&pesan=gagal");
    }
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $npp = $_POST['nppuser'];
    $user = $_POST['username'];
    $role = $_POST['role'];
    $lokasi = $_POST['lokasi'];
    // echo $_FILES['profil']['name'];
    // die();
    if (empty($_FILES['profil']['name'])) {
      $profil = $_GET['foto'];
      // echo $id, $nama, $npp, $user, $role, $password, $profil, $lokasi;
      // die();
      $updateDataUser = $database->updateUserData($id, $nama, $npp, $user, $role, $password, $profil, $lokasi);
      if ($updateDataUser) {
        header("Location: ../../pages/controllers/index/hal.php?i=pages7&pesan=edited");
      } else {
        header("Location: ../../pages/controllers/index/hal.php?i=pages7&pesan=gagaledit");
      }
    } else {
      $tempdir = "../../assets/profile/";
      if (!file_exists($tempdir))
        mkdir($tempdir, 0755);
      //gambar akan di simpan di folder gambar
      $target_path = $tempdir . basename($_FILES['profil']['name']);

      //nama gambar
      $profil = $_FILES['profil']['name'];
      //ukuran gambar
      $ukuran_gambar = $_FILES['profil']['size'];

      $fileinfo = @getimagesize($_FILES["profil"]["tmp_name"]);
      //lebar gambar
      $width = $fileinfo[0];
      //tinggi gambar
      $height = $fileinfo[1];
      if ($ukuran_gambar > 819200) {
        echo "<script>swal.fire({title: 'Gagal!',text: 'Ukuran Melebihi Batas Rincian, Maximal 800KB',icon: 'error',
        });</script>";
      } else if ($width > "480" || $height > "640") {
        echo "<script>swal.fire({title: 'Gagal!',text: 'Ukuran Foto Harus 480x640 atau kurang!',icon: 'error',
        });</script>";
      } else {
        if (move_uploaded_file($_FILES['profil']['tmp_name'], $target_path)) {
      // echo $id, $nama, $npp, $user, $role, $password, $profil, $lokasi;
      // die();
          $updateDataUser = $database->updateUserData($id, $nama, $npp, $user, $role, $password, $profil, $lokasi);
          if ($updateDataUser) {
            header("Location: ../../pages/controllers/index/hal.php?i=pages7&pesan=edited");
          } else {
            header("Location: ../../pages/controllers/index/hal.php?i=pages7&pesan=gagaledit");
          }
        }
      }
    }
  } else if ($sesi == "locker") {
    if (isset($_POST['id'], $_POST['nomor'], $_POST['kode'], $_POST['nogedung'], $_POST['namagedung'])) {
      $id = $_POST['id'];
      $nomor = $_POST['nomor'];
      $kode = $_POST['kode'];
      $nogedung = $_POST['nogedung'];
      $namagedung = $_POST['namagedung'];
      $updateLocker = $database->updateDataLocker($id, $nomor, $kode, $nogedung, $namagedung);
      if ($updateLocker) {
        echo "sukses";
      } else {
        echo "error";
      }
      // echo $id, $nomor, $kode, $nogedung, $namagedung;
      // die();
    } else {
      echo "error";
    }
  } else if ($sesi == "status") {
    if (isset($_POST['id'], $_POST['status'])) {
      $id = $_POST['id'];
      $status = $_POST['status'];
      if($status == 0){
        $setStatus = 1;
        $pesan = "dibuka";
      }else{
        $setStatus = 0;
        $pesan = "dikunci";
      }
      // echo $id, $status;
      // die();
      $updateLockerStatus = $database->updateStatusLocker($id,$setStatus);
      if ($updateLockerStatus) {
        echo $pesan;
      } else {
        echo "error";
      }
    } else {
      echo "error";
    }
  }
}

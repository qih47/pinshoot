<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';

if (isset($_GET['sesi'])) {
  $sesi = $_GET['sesi'];
  // echo $sesi;
  // die();
  if ($sesi == "akses") {
    if (isset($_POST['personil'], $_POST['loker'], $_POST['norf'])) {
      $idPersonil = $_POST['personil'];
      $idLocker = $_POST['loker'];
      $norfid = $_POST['norf'];
      $tglDaftar = date('Y-m-d H:i:s');
      $data = array();
      $data_entry = array(
        'idPersonil' => (string)$idPersonil,
        'idLocker' => (string)$idLocker,
        'rfid' => $norfid
      );

      if (file_exists('../../akses.json')) {
        $data = json_decode(file_get_contents('../../akses.json'), true);
      }

      $data[] = $data_entry;

      file_put_contents('../../akses.json', json_encode($data, JSON_PRETTY_PRINT));
      $insertAkses = $database->insertAksesPersonil($idPersonil, $idLocker, $tglDaftar, $norfid);
      if ($insertAkses) {
        echo "sukses";
      } else {
        echo "error";
      }
    } else {
      echo "error";
    }
  } else if ($sesi == "personil") {
    if (isset($_POST['nama'], $_POST['npp'], $_POST['divisi'], $_POST['lokasi'])) {
      $nama = $_POST['nama'];
      $npp = $_POST['npp'];
      $divisi = $_POST['divisi'];
      $lokasi = $_POST['lokasi'];
      $rfid = "";
      // echo $nama.$npp.$divisi.$lokasi;
      // die();
      $insertPersonil = $database->insertDataPersonil($nama, $npp, $divisi, $rfid, $lokasi);
      if ($insertPersonil) {
        echo "sukses";
      } else {
        echo "error";
      }
    } else {
      echo "error";
    }
  } else if ($sesi == "user") {
    if ($_POST['password'] == $_POST['verpassword']) {
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    } else {
      header("Location: ../../pages/controllers/index/hal.php?i=pages9&pesan=gagal");
    }
    $npp = $_POST['nppuser'];
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $role = $_POST['role'];
    $lokasi = $_POST['lokasi'];

    $tempdir = "../../assets/profile/";
    if (!file_exists($tempdir)) {
      mkdir($tempdir, 0755);
    }

    $target_path = $tempdir . basename($_FILES['profil']['name']);
    $profil = $_FILES['profil']['name'];
    $ukuran_gambar = $_FILES['profil']['size'];

    $fileinfo = @getimagesize($_FILES["profil"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    if ($ukuran_gambar > 1019200) {
      echo 'Ukuran gambar melebihi 80kb';
    } elseif ($width > 480 || $height > 640) {
      echo 'Ukuran gambar harus 480x640';
    } else {
      if (move_uploaded_file($_FILES['profil']['tmp_name'], $target_path)) {
        $insertUser = $database->insertUser($npp, $nama, $user, $role, $password, $profil, $lokasi);
        if ($insertUser) {
          // echo $npp, $nama, $user, $role, $password, $profil, $lokasi;
          // die();
          header("Location: ../../pages/controllers/index/hal.php?i=pages7&pesan=sukses");
        } else {
          // echo $npp, $nama, $user, $role, $password, $profil, $lokasi;
          // die();
          header("Location: ../../pages/controllers/index/hal.php?i=pages7&pesan=gagal");
        }
      }
    }
  } else if ($sesi == "locker") {
    if (isset($_POST['nomor'], $_POST['kode'], $_POST['nogedung'], $_POST['namagedung'])) {
      $nomor = $_POST['nomor'];
      $kode = $_POST['kode'];
      $nogedung = $_POST['nogedung'];
      $namagedung = $_POST['namagedung'];
      // echo $nomor.$kode.$nogedung.$namagedung;
      $insertLocker=$database->inserLocker($nomor, $kode, $nogedung, $namagedung);
      if($insertLocker){
        echo "sukses";
      } else {
        echo "error";
      }
    }
  }
}

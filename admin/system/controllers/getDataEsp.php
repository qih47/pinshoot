<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';

$sesi = $_POST['sesi'];

if ($sesi == "status") {
  try {
    $rfid = $_POST['rfid'];
    $getPersonil = $database->getAksesPersonilByRf($rfid);
    $id = $getPersonil['idLock'];
    $status = $getPersonil['status'];
      $response_data = array(
          'id_locker' => $id
      );

      // Ubah array ke format JSON
      $json_response = json_encode($response_data);

      // Set header untuk menandakan bahwa respons adalah JSON
      header('Content-Type: application/json');

      // Kembalikan respons JSON ke client
      echo $json_response;
    if ($status == 0) {
      $setStatus = '1';
      $pesan = "dibuka";
    } else {
      $setStatus = '0';
      $pesan = "dikunci";
    }

    $updateLockerStatus = $database->updateStatusLocker($id, $setStatus);

    if ($updateLockerStatus) {

      // Delay selama 5 detik
      sleep(5);

      // Kembali mengupdate status menjadi 0 setelah 5 detik
      if ($setStatus == '1') {
        $updateLockerStatus = $database->updateStatusLocker($id, '0');
        if ($updateLockerStatus) {

        } else {
          echo " gagal mengubah status menjadi dikunci";
        }
      }
      
      // Membuat array respons

    } else {
      echo " gagal";
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>

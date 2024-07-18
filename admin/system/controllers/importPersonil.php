<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/locker/vendor/autoload.php';

if ($_FILES["import_excel"]["name"] != '') {
    $allowed_extension = array('xls', 'csv', 'xlsx');
    $file_array = explode(".", $_FILES["import_excel"]["name"]);
    $file_extension = end($file_array);

    if (in_array($file_extension, $allowed_extension)) {
        $file_name = time() . '.' . $file_extension;
        move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
        $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

        $spreadsheet = $reader->load($file_name);

        unlink($file_name);

        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $row) {
            $insert_data = array(

                ':nama_personil'  => $row[0],
                ':npp'  => $row[1],
                ':divisi'  => $row[2],
                ':rfid'  => $row[3],
                ':lokasi'  => $row[4]
            );

            $query = "
   INSERT INTO personil
   (nama_personil,npp,id_divisi,no_rfid,lokasi) 
   VALUES (:nama_personil, :npp, :divisi,:rfid, :lokasi)
   ";

            $statement = $pdo->prepare($query);
            $statement->execute($insert_data);
        }
        $message = '<div class="alert alert-success">Import Selesai, Data Personil Telah Ditambahkan</div>';
    } else {
        $message = '<div class="alert alert-danger">Hanya file .xls .csv or .xlsx Yang Diijinkan</div>';
    }
} else {
    $message = '<div class="alert alert-danger">Silahkan Pilih File Terlebih Dahulu..!!</div>';
}

echo $message;

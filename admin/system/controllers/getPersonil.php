<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $namaPersonil = $database->getNamaPersonilById($id);

    // Mengembalikan data sebagai respons JSON
    header('Content-Type: application/json');
    echo json_encode($namaPersonil);
} else {
    // Jika parameter 'id' tidak ada atau tidak valid, kembalikan respons kosong
    echo '';
}
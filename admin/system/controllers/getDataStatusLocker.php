<?php
// Lakukan koneksi ke database
// ...

// Ambil data terbaru dari database
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';
$data = $database->getLocker();

// Kembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);

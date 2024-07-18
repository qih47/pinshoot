<?php
// Koneksi ke database
require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/config/db/sync.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/config/db/maok.php';
$database = new Database($pdo);


$expiredSessions = $database->getSessionTokenExpired();

// Cek apakah ada sesi yang kadaluarsa
if (!empty($expiredSessions)) {
    // Panggil metode deleteExpiredSessions()
    $deletedRows = $database->deleteExpiredSessions();
    // Tampilkan pesan berhasil
    echo "<div id='alert' name='alert' class='alert alert-success'><strong>'. $deletedRows .'Berhasil di hapus!</strong> Sesi Token Expired</div>";
} else {
    echo "<div id='alert' name='alert' class='alert alert-success'><strong>Tidak ada sesi token expired!</strong> Pengecekan ulang....</div>"; 
}





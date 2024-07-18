<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/sys-login/getInfo.php';

// Mendapatkan data dari form
$nppOrUsername = $_POST['npp'];
$password = $_POST['password'];

// Cek apakah login menggunakan NPP atau username
$user = $database->getUserByNppOrUsername($nppOrUsername);
$npp = $user['npp'];
$nama = $user['nama'];
$role = $user['role'];
if ($user) {
    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Generate token sesi
        $token = generateToken();
        date_default_timezone_set('Asia/Jakarta');
        $expiry = date('Y-m-d H:i:s');
        // Simpan token sesi di database
        if ($database->insertSessionLogin($npp, $token, $expiry) && $database->insertHistoryLogin($token, $expiry, $npp, $nama, $role, $browserName, $browserVersion, $deviceType)) {
            // Set token sesi sebagai cookie
            setcookie('session_token', $token, time() + 3600, '/'); // Cookie berlaku selama 1 jam
            session_start();
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['profile'] = $user['profile'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['npp'] = $user['npp'];
            $_SESSION['lokasi'] = $user['lokasi'];
            $_SESSION['token'] = $token;
            $_SESSION['level'] = $user['role'];
            // alihkan ke halaman dashboard admin
            $hal = md5('dashboard');
            header("location:../../pages/controllers/index/hal.php?i=pages1&pesan=loginback");
            exit;
        } else {
            header("location:../../signin.php?hal=main&pesan=gagal");
            exit;
        }
    } else {
        header("location:../../signin.php?hal=main&pesan=salah");
        exit;
    }
} else {
    header("location:../../signin?hal=main&pesan=nouser");
    exit;
}

function generateToken()
{
    return bin2hex(random_bytes(32)); // Menghasilkan token sesi acak
}

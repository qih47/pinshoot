<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/config/db/dbconn.php';
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "login") {
        require_once "system/config/policy/session-token-expired.php";
        include "signin.php";
        if ($_GET['pesan'] == "habis_sesi") {
            echo '<script>
        const Toast = Swal.mixin({
            toast: true,
            position: \'top-left\',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener(\'mouseenter\', Swal.stopTimer)
                toast.addEventListener(\'mouseleave\', Swal.resumeTimer)
            },
            willClose: () => {
                document.querySelector(\'.swal-toast-container\');
            }
        });

        Toast.fire({
            icon: \'warning\',
            title: \'Sesi anda sudah berakhir, silahkan login kembali..!!\'
        });
    </script>';
        }
    } else if ($_GET['hal'] == "logout") {
        include "signout.php";
    } else if ($_GET['hal'] == "not_found") {
        include "apps/error_pages/error-404.php";
    } else {
        session_start();
        $session_value = (isset($_SESSION['token'])) ? $_SESSION['token'] : '';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/config/policy/secure-pages.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/lib/lib-head.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/viewres/spinner.php';

        $hal = $_GET['hal'];
        $row = $database->getHalPath($hal);

        // CEK ERROR
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        function customErrorHandler($errno, $errstr, $errfile, $errline)
        {
            echo '<div style="color: red;">Terjadi kesalahan: ' . $errstr . ' di ' . $errfile . ' pada baris ' . $errline . '</div>';
        }
        set_error_handler('customErrorHandler');

        include "main.php";
    }
} else {
    include "signin.php";
    // header("location:pages/controllers/index/hal.php?i=pages1&pesan=loginback");
}

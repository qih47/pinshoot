<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';


if (isset($_GET['sesi'])) {
    $id = $_GET['id'];
    $sesi = $_GET['sesi'];

    if ($sesi == "akses") {
        $deleteAkses = $database->deletePersonilAkses($id);
        if ($deleteAkses) {
            header("location:../../pages/controllers/index/hal.php?i=pages2&pesan=dihapus");
        } else {
            header("location:../../pages/controllers/index/hal.php?i=pages2&pesan=gagalhapus");
        }
    } else if ($sesi == "personil") {
        $deletePersonil = $database->deletePersonilData($id);
        if ($deletePersonil) {
            header("location:../../pages/controllers/index/hal.php?i=pages4&pesan=dihapus");
        } else {
            header("location:../../pages/controllers/index/hal.php?i=pages4&pesan=gagalhapus");
        }
    } else if ($sesi == "user") {
        $deleteUser = $database->deleteUserData($id);
        if ($deleteUser) {
            header("location:../../pages/controllers/index/hal.php?i=pages7&pesan=dihapus");
        } else {
            header("location:../../pages/controllers/index/hal.php?i=pages7&pesan=gagalhapus");
        }
    } else if ($sesi == "locker") {
        $deleteLocker = $database->deleteLockerData($id);
        if ($deleteLocker) {
            header("location:../../pages/controllers/index/hal.php?i=pages11&pesan=dihapus");
        } else {
            header("location:../../pages/controllers/index/hal.php?i=pages11&pesan=gagalhapus");
        }
    }
}

<?php
// session_start();
$session_value = (isset($_SESSION['token'])) ? $_SESSION['token'] : '';
require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/config/db/dbconn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/config/policy/secure-pages.php';


?>
<!DOCTYPE html>
<html lang="en">
<title>LOCKER SYSTEM - PAM</title>
<link rel="stylesheet" href="assets/css/sweetalert2.min.css">
<script src="assets/sweetalert/sweetalert2.min.js"></script>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/lib/lib-head.php';
?>
<!-- Header -->

<body>
    <div class="container-fluid position-relative d-flex p-0">

        <?php
        $hal = $_GET['hal'];
        $row = $database->getHalPath($hal);
        // spinner
        // require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/viewres/spinner.php';
        // sidebar
        require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/viewres/sidebar.php';
        ?>
        <!-- Content Start -->
        <div class="content">
            <?php
            // navbar
            require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/viewres/nav.php';
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "loginback") {
                    echo "<div id='alert' name='alert' class='alert alert-success'><strong>Login Berhasil!</strong> Selamat Datang $_SESSION[nama] !</div>";
                }
            }

            include $_SERVER['DOCUMENT_ROOT'] . '/' . $row['path'] . '.php';
            ?>

            <!-- footer -->
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/pinshoot/admin/system/lib/lib-footer.php';
            ?>
            <!-- footer -->
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>

</html>
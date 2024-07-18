<!DOCTYPE html>
<html lang="en">
<?php
require "system/lib/lib-head.php";
require_once "system/config/policy/session-token-expired.php";
?>

<head>
    <style>
        .card {
            position: relative;
            border-radius: 20px;
            height: 670px;
            width: 450px;
            right: -35%;
            bottom: 10%;
            background-color: #f8f9fa;
            /* Set your desired card background color here */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .bg-position {
            position: relative;
            border-radius: 20px;
            right: 0%;
            left: 15%;
            bottom: 20%;
        }

        .login-button {
            position: absolute;
            bottom: 25%;
            right: -8%;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            background-color: black;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transform: translateY(50%);
        }

        .login-button i {
            font-size: 24px;
        }

        .flip-container {
            perspective: 1000px;
        }

        .flipper {
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }

        .flip-container:hover .flipper {
            transform: rotateY(180deg);
        }

        .front,
        .back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .front {
            z-index: 2;
        }

        .back {
            transform: rotateY(180deg);
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="card bg-secondary p-4 p-sm-8 my-8 mx-8" style=" height: 670px; width: 450px;">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="signin.php?hal=login" class="text-center">
                                <i class="fa fa-crosshairs me-2 pt-3" style="font-size: 8rem;"></i>
                                <!-- <img src="assets/img/logo_pindad.png" alt="pindad" style="height: 5rem;width: 5rem; bottom: 99%;right: 90%;"> -->
                                <h1 class="text-primary">PINSHOOT</h1>
                            </a>
                        </div>
                        <h3 class="pt-3">Login</h3>
                        <form action="system/sys-login/auth.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="npp" name="npp" placeholder="NPP">
                                <label for="floatingInput">NPP / Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <?php

                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "salah") {
                                    echo "<div class='alert alert-warning'><strong>UPSS !</strong> Kayanya Password atau npp salah!</div>";
                                }
                                if ($_GET['pesan'] == "nouser") {
                                    echo "<div class='alert alert-warning'><strong>UPSS !</strong> Kayanya user tidak ditemukan!</div>";
                                }
                                if ($_GET['pesan'] == "gagal") {
                                    echo "<div class='alert alert-warning'><strong>UPSS !</strong> Gagal Login silahkan cobalagi..!!</div>";
                                }
                            }

                            ?>
                            <div class='form-check clearfix '>

                            </div>
                            <div class="clearfix">
                                <button class="login-button btn btn-primary float-end" onclick="location.href='system/sys-login/cek-login'">
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                        <img src="assets/img/login-hal-tr.png" alt="Gambar" class="img-fluid" style="width: 100%; height: auto;">
                        <div class="row">
                            <div class="col-12 col-sm-6 text-center text-sm-start">
                                &copy; <a href="#">PINSHOOT</a>
                            </div>
                            <div class="col-12 col-sm-6 text-center text-sm-end">
                                <a href="#">Version 1.0</a>-Alpha
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-position" style=" height: 270px; width: 1000px;">
                    <img src="assets/img/lock.png" alt="Gambar" class="img-fluid" style="width: 70%; height: auto;">
                </div>
                <div class="mb-0">
                    <?php
                    require_once "system/lib/lib-footer.php";
                    ?>
                </div>
                <!-- footer -->
            </div>
        </div>
        <!-- Sign In End -->
    </div>

</body>

</html>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
</script>

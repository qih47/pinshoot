<!-- Recent Sales Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-12">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div id='alert' name='alert' class='alert alert-danger'><strong>Gagal Input!</strong> Data gagal ditambahkan, Password yang anda masukan tidak sesuai!</div>";
                    echo '<script>
        const Toast = Swal.mixin({
            toast: true,
            position: \'top-end\',
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
            title: \'Data user gagal ditambah!!\'
        });
    </script>';
                }

            }
            ?>
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0">TAMBAH USER</h2>
                </div>
                <div class="d-flex align-item-left justify-conten-betwen mb-2">
                    <a href="pages/controllers/index/hal.php?i=pages7" class="btn btn-primary mb-4">Tabel User<i class="fa fa-user ms-2"></i></a>
                </div>
                <h6 class="mb-4" align="left">INFORMASI DATA</h6>
                <form action="system/controllers/simpanData.php?sesi=user" method="post" id="tambahUser" enctype="multipart/form-data">
                    <div class="row g-4 ml-4">
                        <div class="row g-4 rounded">
                            <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" >
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                                <input type="text" class="form-control" style="background-color: black;" name="nama" id="nama" placeholder="Nama Lengkap">
                                <label for="nama">Nama Lengkap</label>
                            </div>
                            <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                                <input type="text" class="form-control" style="background-color: black;" name="nppuser" id="nppuser" placeholder="NPP">
                                <label for="nppuser">NPP</label>
                            </div>
                            <div class="form-group col-sm-3 col-md-3 col-xl-3 mb-0" style="text-align: start; border-color: green; font-weight:bold;">
                                <select class="form-select form-select-lg" style="text-align: left;height: 58px;" name="role" id="role" required oninput="setCustomValidity('')">
                                    <option required> Pilih Role</option>
                                    <option value="Admin"> Admin</option>
                                    <option value="User"> User</option>
                                </select>
                            </div>
                        </div>
                        <div class="row rounded">
                            <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeyup="checkPasswordMatch()">
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                                <input type="password" class="form-control" style="background-color: black;" name="verpassword" id="verpassword" placeholder="Verifikasi Password" onkeyup="checkPasswordMatch()">
                                <medium id="passwordMatchMessage"></medium>
                                <label for="verpassword">Input Ulang Password</label>
                            </div>
                            <div class="form-group col-sm-3 col-md-3 col-xl-3 mb-0" style="text-align: start; border-color: green; font-weight:bold;">
                                <select class="form-select form-select-lg" style="text-align: left;height: 58px;" name="lokasi" id="lokasi" required oninput="setCustomValidity('')">
                                    <option required> Pilih Lokasi</option>
                                    <option value="Bandung "> Bandung</option>
                                    <option value="Jakarta"> Jakarta</option>
                                    <option value="Turen"> Turen</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" align="right">
                                    <input type="file" name="profil" id="profil" onchange="readURL(this);" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-11">
                                <img align="right" style="width: 3cm;height: 4cm; margin:15px 70px 10px 15px;" id="foto" src="assets/img/download.jfif" />

                                <div style="text-align: right;  margin:0px 20px 10px -207px;">
                                </div>
                                <!-- <span class="col-3">PAS FOTO</span> -->
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end mb-4">
                            <input class="btn btn-primary" type="submit" id="daftar" name="daftar" value="Tambah">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
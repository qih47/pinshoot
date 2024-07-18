<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-12">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "sukses") {
                    echo "<div id='alert' name='alert' class='alert alert-success'><strong>Input Berhasil!</strong> Akses Personil berhasil ditambahkan!</div>";
                }
                if ($_GET['pesan'] == "edited") {
                    echo "<div id='alert' name='alert' class='alert alert-success'><strong>Edit Berhasil!</strong> Akses Personil berhasil diubah!</div>";
                }
                if ($_GET['pesan'] == "dihapus") {
                    echo "<div id='alert' name='alert' class='alert alert-warning'><strong>Hapus Berhasil!</strong> Akses Personil berhasil dihapus!</div>";
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
            title: \'Data akses personil telah dihapus!!\'
        });
    </script>';
                }
                if ($_GET['pesan'] == "gagalhapus") {
                    echo "<div id='alert' name='alert' class='alert alert-danger'><strong>Gagal Hapus!</strong> Akses Personil gagal dihapus!</div>";
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
            icon: \'error\',
            title: \'Data akses personil gagal dihapus!!\'
        });
    </script>';
                }
            }
            ?>
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0">AKSES PERSONIL</h2>
                </div>
                <div class="d-flex align-item-left justify-conten-betwen mb-4">
                    <a href="pages/controllers/index/hal.php?i=pages3" class="btn btn-primary">Tambah Akses<i class="fa fa-user-plus ms-2"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-4" style="color:black; background-color: black;background:linear-gradient(to bottom,black, black)" id="tableAkses" name="tableAkses">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NPP</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Nomor Loker</th>
                                <th scope="col">Nomor Gedung</th>
                                <th scope="col">Nama Gedung</th>
                                <th scope="col">Nomor RFID</th>
                                <th scope="col">Tanggal Daftar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
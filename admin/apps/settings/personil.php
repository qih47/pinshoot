<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-12">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "sukses") {
                    echo "<div id='alert' name='alert' class='alert alert-success'><strong>Input Berhasil!</strong> Data Personil berhasil ditambahkan!</div>";
                }
                if ($_GET['pesan'] == "edited") {
                    echo "<div id='alert' name='alert' class='alert alert-success'><strong>Edit Berhasil!</strong> Data Personil berhasil diubah!</div>";
                }
                if ($_GET['pesan'] == "gagaledit") {
                    echo "<div id='alert' name='alert' class='alert alert-warning'><strong>Edit Gagal!</strong> Data personil tidak diubah!</div>";
                }
                if ($_GET['pesan'] == "dihapus") {
                    echo "<div id='alert' name='alert' class='alert alert-warning'><strong>Hapus Berhasil!</strong> Data Personil berhasil dihapus!</div>";
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
            title: \'Data personil telah dihapus!!\'
        });
    </script>';
                }
                if ($_GET['pesan'] == "gagalhapus") {
                    echo "<div id='alert' name='alert' class='alert alert-danger'><strong>Gagal Hapus!</strong> Data Personil gagal dihapus!</div>";
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
            title: \'Data personil gagal dihapus!!\'
        });
    </script>';
                }
            }
            ?>
            <div class="bg-secondary text-left rounded p-4">
                <div class="d-flex align-items-left justify-content-between mb-4">
                    <h2 class="mb-0">PERSONIL</h2>
                </div>

                <div class="align-item-left justify-conten-betwen mb-4 col-md-12" style="align-content: flex-start;">
                    <a href="pages/controllers/index/hal.php?i=pages5" class="btn btn-primary">Tambah Personil<i class="fa fa-user-plus ms-2"></i></a>
                    <span href="#" class="btn btn-primary" id="import">Import Personil<i class="fa fa-file-import ms-2"></i></span>
                </div>
                <fieldset>
                    <span id="message"></span>
                    <form method="post" id="import_personil_excel_form" enctype="multipart/form-data">
                        <div class="form-group fade hidden col-3 " style="width: 350px;" name="import_file" id="import_file">
                            <label for="exampleInputFile">Upload FIle (Gunakan file xlsx atau csv)</label>
                            <input type="file" name="import_excel" class="form-control" id="import_excel">
                        </div>
                        <div class="pt-2"><input type="submit" class="btn btn-primary fade hidden" name="imports" id="imports" value="Import">
                        </div>
                    </form>
                </fieldset>
                <div class="table-responsive">

                    <table class="table text-start align-middle table-bordered table-hover mb-4" style="color:black; background-color: black;background:linear-gradient(to bottom,black, black)" id="tablePersonil" name="tablePersonil">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NPP</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Nomor RFID</th>
                                <th scope="col">Lokasi</th>
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
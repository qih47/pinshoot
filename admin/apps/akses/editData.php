<!-- Recent Sales Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-12">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0">EDIT AKSES KUNCI</h2>
                    <span id="test"></span>
                </div>
                <div class="d-flex align-item-left justify-conten-betwen mb-2">
                    <a href="pages/controllers/index/hal.php?i=pages2" class="btn btn-primary mb-4">Akses Personil<i class="fa fa-id-card ms-2"></i></a>
                </div>
                <h6 class="mb-4" align="left">INFORMASI DATA</h6>
                <div class="row g-4 ml-4">

                    <div class="form-group mb-3 col-sm-12 col-md-6 col-xl-6 ml-4" style="text-align: start; border-color: green; font-weight:bold;width: 25%;">
                        <span id="nolocker"></span>
                        <select class="choices form-select" style="text-align: left;" name="locker" id="locker" required>
                            <option required> Pilih Nomor Locker</option>
                            <?php
                            $lockerOptions = $database->getNomorLockerOptions();
                            if (!empty($lockerOptions)) {
                                foreach ($lockerOptions as $row) {
                            ?>
                                    <option value="<?= $row["id"] ?>"> <?= $row["nomor"] ?> - GD(<?= $row["NoGedung"] ?>)</option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <?php
                $id = $_GET['pesan'];
                $edit = $database->getAksesPersonilById($id);
                ?>
                <div class="row g-4 rounded">
                    <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                        <input type="text" class="form-control" style="background-color: black;" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $edit['nama_personil']; ?>" readonly>
                        <label for="nama">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                        <input type="text" class="form-control" style="background-color: black;" id="npps" name="npps" placeholder="NPP" value="<?= $edit['npp']; ?>" readonly>
                        <label for="nonpp">NPP</label>
                    </div>
                    <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                        <input type="text" class="form-control" style="background-color: black;" id="divisi" name="divisi" placeholder="Divisi" value="<?= $edit['nama_divisi']; ?>" readonly>
                        <label for="divisi">Divisi</label>
                    </div>
                    <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                        <input type="text" class="form-control" style="background-color: white;" id="norfid" name="norfid" value="<?= $edit['no_rfid']; ?>" placeholder="NO RFID">
                        <label for="norfid">NO RFID</label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-end mb-4">
                    <button class="btn btn-primary" type="button" id="daftar" name="daftar" onclick="editAkses();">Edit<i class="fa fa-user-plus ms-2"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
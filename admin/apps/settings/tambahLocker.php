<!-- Recent Sales Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-12">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0">TAMBAH LOCKER</h2>
                </div>
                <div class="d-flex align-item-left justify-conten-betwen mb-2">
                    <a href="pages/controllers/index/hal.php?i=pages11" class="btn btn-primary mb-4">Tabel Locker<i class="fa fa-key ms-2"></i></a>
                </div>
                <div class="row g-4 rounded">
                    <span id="test"></span>
                    <h6 align="left">INFORMASI DATA</h6>
                    <div class="form-group mb-3 col-sm-12 col-md-6 col-xl-3 ml-4" style="text-align: start; border-color: green; font-weight:bold;">
                        <select class="form-select form-select-lg" style="text-align: left;height: 58px;" name="nomor" id="nomor" required onchange="updateKodeLocker()">
                            <option required>Pilih Nomor</option>
                            <?php
                            for ($i = 1; $i <= 120; $i++) {
                                $lockerNumber = str_pad($i, 2, '0', STR_PAD_LEFT); // Format as two digits with leading zeros
                                $lockerName = "Locker-" . $lockerNumber;
                                echo '<option value="' . $lockerName . '">' . $lockerName . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                        <input type="text" class="form-control" style="background-color: black;" id="kode" placeholder="Kode Locker" readonly>
                        <label for="nama">Kode Locker</label>
                    </div>
                    <div class="form-group mb-3 col-sm-12 col-md-6 col-xl-3 ml-4" style="text-align: start; border-color: green; font-weight:bold;">
                        <select class="form-select form-select-lg" style="text-align: left;height: 58px;" name="nogedung" id="nogedung" required>
                            <option required>Pilih Nomor Gedung</option>
                            <?php
                            for ($i = 1; $i <= 120; $i++) {
                                $gedungNumber = str_pad($i, 2, '0', STR_PAD_LEFT); // Format as two digits with leading zeros
                                $gedungKode = "Gedung-" . $gedungNumber;
                                echo '<option value="' . $gedungKode . '">' . $gedungKode . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                        <input type="text" class="form-control" style="background-color: black;" id="namaGedung" placeholder="Nama Gedung">
                        <label for="namaGedung">Nama Gedung</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-end mb-4">
                        <button class="btn btn-primary" type="button" id="tambah" name="tambah" onclick="tambahLocker();">Tambah<i class="fa fa-plus ms-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
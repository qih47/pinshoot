<!-- Recent Sales Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-12">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0">EDIT PERSONIL</h2>
                </div>
                <div class="d-flex align-item-left justify-conten-betwen mb-2">
                    <a href="pages/controllers/index/hal.php?i=pages4" class="btn btn-primary mb-4">Tabel Personil<i class="fa fa-users ms-2"></i></a>
                </div>
                <div class="row g-4 rounded">
                    <span id="test"></span>
                    <h6 align="left">INFORMASI DATA</h6>
                    <?php
                    $id = $_GET['pesan'];
                    $edit = $database->getNamaPersonilById($id);
                    ?>
                    <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                        <input type="text" class="form-control" style="background-color: black;" id="nama" placeholder="Nama Lengkap" value="<?= $edit['nama']; ?>">
                        <label for="nama">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                        <input type="text" class="form-control" style="background-color: black;" id="nppedit" placeholder="NPP" value="<?= $edit['npp']; ?>">
                        <label for="nonpp">NPP</label>
                    </div>
                    <div class="form-group mb-3 col-sm-12 col-md-6 col-xl-3 ml-4" style="text-align: start; border-color: green; font-weight:bold;">
                        <select class="form-select form-select-lg" style="text-align: left;height: 58px;" name="divisi" id="divisi" required>
                            <option value="<?= $edit['idDivisi']; ?>"> <?= $edit['divisi']; ?></option>
                            <?php
                            $getDivisi = $database->getDivisi();
                            if (!empty($getDivisi)) {
                                foreach ($getDivisi as $row) {
                            ?>
                                    <option value="<?= $row["id"] ?>">
                                        <?= $row["kode_divisi"] ?> (
                                        <?= $row["nama_divisi"] ?> )
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-3 col-md-3 col-xl-3 mb-0" style="text-align: start; border-color: green; font-weight:bold;">
                        <select class="form-select form-select-lg" style="text-align: left;height: 58px;" name="lokasi" id="lokasi" required oninput="setCustomValidity('')">
                            <option value="<?= $edit['lokasi']; ?>"><?= $edit['lokasi']; ?></option>
                            <option value="Bandung">Bandung</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Turen">Turen</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center justify-content-end mb-4">
                        <button class="btn btn-primary" type="button" id="tambah" name="tambah" onclick="editPersonil();">Edit<i class="fa fa-edit ms-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
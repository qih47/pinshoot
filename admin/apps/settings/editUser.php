<!-- Recent Sales Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-12">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0">EDIT USER</h2>
                </div>
                <div class="d-flex align-item-left justify-conten-betwen mb-2">
                    <a href="pages/controllers/index/hal.php?i=pages7" class="btn btn-primary mb-4">Tabel User<i class="fa fa-user ms-2"></i></a>
                </div>
                <h6 class="mb-4" align="left">INFORMASI DATA</h6>
                <?php
                $id = $_GET["pesan"];
                $edit = $database->getUserforEdit($id);

                // die();
                ?>
                <form action="system/controllers/editData.php?sesi=user&id=<?= $id ?>&foto=<?= $edit['profile']; ?>" method="post" id="ubahUser" enctype="multipart/form-data">
                    <div class="row g-4 ml-4">
                        <div class="row g-4 rounded">
                            <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $edit['username']; ?>">
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                                <input type="text" class="form-control" style="background-color: black;" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= $edit['nama']; ?>">
                                <label for=" nama">Nama Lengkap</label>
                            </div>
                            <div class="form-floating mb-3 col-sm-3 col-md-3 col-xl-3">
                                <input type="text" class="form-control" style="background-color: black;" name="nppuser" id="nppuser" placeholder="NPP" value="<?= $edit['npp']; ?>">
                                <label for=" nppuser">NPP</label>
                            </div>
                            <div class="form-group col-sm-3 col-md-3 col-xl-3 mb-0" style="text-align: start; border-color: green; font-weight:bold;">
                                <select class="form-select form-select-lg" style="text-align: left;height: 58px;" name="role" id="role" required oninput="setCustomValidity('')">
                                    <option value="<?= $edit['role']; ?>"><?= $edit['role']; ?></option>
                                    <option value=" Admin"> Admin</option>
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
                                    <option value="<?= $edit['lokasi']; ?>"> <?= $edit['lokasi']; ?></option>
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
                                <img align="right" style="width: 3cm;height: 4cm; margin:15px 70px 10px 15px;" id="foto" src="assets/profile/<?= $edit['profile']; ?>" />

                                <div style="text-align: right;  margin:0px 20px 10px -207px;">
                                </div>
                                <!-- <span class="col-3">PAS FOTO</span> -->
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end mb-4">
                            <input class="btn btn-primary" type="submit" id="ubah" name="ubah" value="Ubah">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
<script>
    $(document).ready(function() {
            $('#npp').on('change', function() {
                    $('#nama').empty();
                    var id = this.value;

                    $.get("../../system/controllers/getPersonil.php", {
                            id: id
                        }

                        ,
                        function(data) {
                            var nama_personil = data;
                            console.log(nama_personil);
                            $('#nama').val(nama_personil.trim());
                        }

                    );
                }

            );
        }

    );
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            allowClear: true,
            placeholder: 'Cari NPP atau NAMA PERSONIL',
            minimumInputLength: 2,
            ajax: {
                url: 'search.php', // URL untuk melakukan pencarian jarak jauh
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            templateResult: function(data) {
                // Menampilkan opsi di paling atas
                if (data.loading) {
                    return data.text;
                }
                var $result = $('<span>' + data.text + '</span>');
                if (data.newOption) {
                    $result.append('<em>Op. Baru</em>');
                }
                return $result;
            },
            escapeMarkup: function(markup) {
                return markup;
            }
        });
    });
</script>
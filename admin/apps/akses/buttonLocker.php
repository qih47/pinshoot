<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .scrolls {
            overflow: hidden;
            /* Awalnya sembunyikan scroll */
            height: 200px;
            border-width: auto;
            box-sizing: border-box;
            white-space: nowrap;
        }

        .scrolls:hover {
            overflow-x: scroll;
            /* Tampilkan scroll horizontal saat mouse masuk ke area tabel */
            overflow-y: scroll;
            /* Tampilkan scroll vertikal saat mouse masuk ke area tabel */
        }

        .imageDiv img {
            box-shadow: 1px 1px 10px #999;
            margin: 2px;
            max-height: 50px;
            cursor: pointer;
            display: inline-block;
            *display: inline;
            /* For IE7*/
            *zoom: 1;
            /* For IE7*/
            vertical-align: top;
        }

        table,
        tr {
            border: 50px;
        }

        td {
            border-right: 20px solid #191C24;
            padding-bottom: 10px;
        }

        .popup {
            position: fixed;
            top: 22%;
            right: auto;
            background-color: black;
            padding: 5px;
            border: 2px solid red;
            z-index: 9999;
            border-radius: 10px;
            text-align: justify;
            display: block;
            white-space: nowrap;
        }

        .show-popup {
            display: block;
        }
    </style>
</head>

<body>
    <div class="scrolls">
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';
        $data = $database->getLocker();

        $a = array();
        $r = 0;

        foreach ($data as $k => $v) {
            if ($k % 10 == 0) {
                $r = $k;
                $a[$k][] = $v;
                continue;
            };
            if ($k % 100 != 0) {
                $a[$r][] = $v;
            }
        }

        echo '<table class="center">';
        foreach ($a as $k => $v) {
            echo '<tr>';
            foreach ($v as $key => $row) {
        ?>
                <td>
                    <div class="row">
                        <div class="col-12" style="margin: auto">
                            <?php
                            if ($row['status'] == 0) {
                            ?>
                                <button id="<?= $row['id'] ?>" name="btnLocker" class="btn btn-primary d-flex d-xl-flex" style="height: 50px; font-size: 12px; line-height: 30px; text-align: center;" value="" data-id="<?= $row['id'] ?>" data-nomor="<?= $row['nomor'] ?>" data-kode="<?= $row['kode_locker'] ?>" data-nomorgedung="<?= $row['NoGedung'] ?>" data-namagedung="<?= $row['ket'] ?>" data-status="<?= $row['status'] ?>" onmouseenter="showPopup(this)" onmouseleave="hidePopup(this)">
                                    <?= strtoupper($row['kode_locker']) ?><i class="fa fa-lock md-1 mt-2 px-2" style="font-size: 20px;"></i>
                                </button>
                            <?php
                            } else {
                            ?>
                                <button id="<?= $row['id'] ?>" name="btnLocker" class="btn btn-primary d-flex d-xl-flex" style="background-color:green;height: 50px; font-size: 12px; line-height: 30px; text-align: center;" value="" data-id="<?= $row['id'] ?>" data-nomor="<?= $row['nomor'] ?>" data-kode="<?= $row['kode_locker'] ?>" data-nomorgedung="<?= $row['NoGedung'] ?>" data-namagedung="<?= $row['ket'] ?>" data-status="<?= $row['status'] ?>" onmouseenter="showPopup(this)" onmouseleave="hidePopup(this)">
                                    <?= strtoupper($row['kode_locker']) ?><i class=" fa fa-unlock md-1 mt-2 px-2" style="font-size: 20px;"></i>
                                </button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </td>

        <?php
            }
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </div>
</body>

</html>
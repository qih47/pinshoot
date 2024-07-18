<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = <<<EOT
 (SELECT akses_kunci.id_akses,akses_kunci.tgl_daftar, locker.nomor,locker.NoGedung,locker.ket,personil.nama_personil,personil.npp,personil.no_rfid,divisi.nama_divisi FROM `akses_kunci` JOIN locker ON akses_kunci.id_locker = locker.id JOIN personil ON akses_kunci.id_personil=personil.id JOIN divisi ON personil.id_divisi = divisi.id ORDER BY id_akses DESC) AS temp
EOT;

// Table's primary key
$primaryKey = 'id_akses';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
    array('db' => 'id_akses', 'dt' => 0),
    array('db' => 'nama_personil', 'dt' => 1),
    array('db' => 'npp',  'dt' => 2),
    array('db' => 'nama_divisi',   'dt' => 3),
    array('db' => 'nomor',     'dt' => 4),
    array('db' => 'NoGedung',     'dt' => 5),
    array('db' => 'ket',     'dt' => 6),
    array('db' => 'no_rfid', 'dt' => 7),
    array('db' => 'tgl_daftar', 'dt' => 8),
);

//  connection
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/sync.php';
$sql_details = array(
    'pdo' => $pdo,

);
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
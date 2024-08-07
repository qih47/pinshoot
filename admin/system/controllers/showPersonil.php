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
 (SELECT personil.*,divisi.nama_divisi FROM personil JOIN divisi ON personil.id_divisi = divisi.id ORDER BY personil.nama_personil ASC) AS temp
EOT;

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'nama_personil', 'dt' => 1),
    array('db' => 'npp',  'dt' => 2),
    array('db' => 'nama_divisi',   'dt' => 3),
    array('db' => 'no_rfid',     'dt' => 4),
    array('db' => 'lokasi',     'dt' => 5),
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
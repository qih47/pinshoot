<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/config/db/dbconn.php';
$index = $_GET['i'];
$id = preg_replace('/[^0-9]/', '', $index);
$message = $_GET['pesan'];
if(!$_GET['pesan']){
    $pesan = "";
}else{
    $pesan = "&pesan=$message";
}
$hal = $database->getHalaman($id);
$halaman = $hal['hal'];
$idHal = $hal['id'];
if(isset($idHal) == $id){
    $updateStatusPage = $database->updatePageStatus($id,$status);
    header("location:../../../?hal=$halaman$pesan");
}
?>
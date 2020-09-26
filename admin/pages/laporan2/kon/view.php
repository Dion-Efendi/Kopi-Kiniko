<?php

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Headers: *");

$koneksi = mysqli_connect("localhost", "root", "", "db_kopi");

$data = $koneksi->query("SELECT * FROM tbl_pemesanan");

$a = [];

while ($rows = mysqli_fetch_assoc($data)) {
    $a[] = $rows;
}


echo json_encode($a);

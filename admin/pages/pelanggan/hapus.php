<?php

$id = $_GET['idhapus'];
$hapus = $koneksi->query("DELETE FROM tbl_pelanggan WHERE pelanggan_id='$id'");
echo $hapus;
echo "<script>
       alert('Data Berhasil Di Hapus');
       window.location='?page=pages/pelanggan/view'
       </script>";

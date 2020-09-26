<?php

$id = $_GET['hhapus'];
$hapus = $koneksi->query("DELETE FROM tbl_ongkir WHERE ongkir_id='$id'");
echo $hapus;
echo "<script>
       alert('Data Berhasil Di Hapus');
       window.location='?page=pages/ongkir/view'
       </script>";

<?php

$id = $_GET['idhapus'];

$hapus = $koneksi->query("DELETE FROM tbl_pemesanan WHERE pemesanan_id='$id'");
echo $hapus;
echo "<script>
       alert('Data Berhasil Di Hapus');
       window.location='?page=pages/pemesan/view'
       </script>";

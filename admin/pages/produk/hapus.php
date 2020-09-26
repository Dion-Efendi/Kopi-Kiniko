<?php

$id = $_GET['idhapus'];

$datafoto = $koneksi->query("SELECT produk_foto From tbl_produk WHERE produk_id = '$id'")->fetch_assoc();
$foto = $datafoto['produk_foto'];

unlink("dist/img/imgproduk/" . $foto);
$koneksi->query("DELETE FROM tbl_produk WHERE produk_id='$id'");

echo "<script>
       alert('Data Berhasil Di Hapus');
       window.location='?page=pages/produk/view'
       </script>";

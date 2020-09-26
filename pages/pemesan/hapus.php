
<?php
// session_start();
$id_produk = $_GET["id"];
unset($_SESSION["pemesan"][$id_produk]);

echo "<script>alert('produk dihapus dari pemesanan');</script>";
echo "<script>location='?page=pages/pemesan/view';</script>";
?>
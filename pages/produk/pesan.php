<?php
// mendapatkan id_produk dari url
$id_tenun = $_GET['idpesan'];
// var_dump($id_tenun);


//  jika sudah ada produk itu di pemesanan, maka produk itu jumlah nya di +1
if (isset($_SESSION['pemesan'][$id_tenun])) {

    $_SESSION['pemesan'][$id_tenun] += 1;
}
// selain itu (blm ada di pemesanan), maka produk di anggap beli 1
else {

    $_SESSION['pemesan'][$id_tenun] = 1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

//larikan ke halaman pemesanan
//echo "<script>alert(' produk telah ada di pemesanan');</script>";
echo "<script>location='?page=pages/pemesan/view';</script>";

<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">
                <a href="?page=pages/produk/view">Produk</a>
            </li>
            <li class="active">
                Pemesanan
            </li>
        </ol>
    </div>
</div>

<br>
<?php
if (empty($_SESSION["pemesan"]) or  !isset($_SESSION["pemesan"])) {
    echo "<script>alert('silahkan pesan barang dulu');</script>";
    echo "<script>location='?page=pages/produk/view';</script>";
}

// $id = $_GET['id'];
// $data = $koneksi->query("SELECT * FROM tbl_produk WHERE produk_id='$id'")->fetch_assoc();
// var_dump($id);
// die;
?>
<!-- <section class="konten">
    <div class="container">
        <h1>Pemesanan Produk</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td></td>
                    <td><?= $data['produk_nama']; ?></td>
                    <td><?= $data['produk_harga'] ?></td>
                    <td><?= $data['jumlah'] ?></td>
                    <td><?= $data['sub_harga'] ?></td>
                    <td>
                        <a onclick="return confirm('Apa Anda Yakin Ingin Menghapus ?')" href="#" data-toggle="tooltip" title="Hapus" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

            </tbody>
        </table>
        <a href="produk.php" class="btn btn-success">Pesan lagi </a>
        <a href="checkout.php" class="btn btn-primary">CheckOut </a>
    </div>
</section>
<br> -->

<section class="konten">
    <div class="container">
        <h1>Pemesanan Produk</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <body>
                <?php $nomor = 1; ?>
                <?php foreach ($_SESSION["pemesan"] as $id_tenun => $jumlah) : ?>


                    <!-- menampilkan produk yg sedang diperulangkan berdasarkan id produk -->
                    <?php
                    // var_dump($_SESSION["pemesan"]);
                    $ambil = $koneksi->query("SELECT * FROM tbl_produk WHERE produk_id='$id_tenun'");
                    $pecah = $ambil->fetch_assoc();
                    $Subharga = $pecah["produk_harga"] * $jumlah;
                    ?>

                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["produk_nama"]; ?></td>
                        <td>Rp.<?php echo number_format($pecah["produk_harga"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp.<?php echo number_format($Subharga); ?></td>
                        <td>
                            <a href="?page=pages/pemesan/hapus&id=<?= $id_tenun ?>" class="btn btn-danger btn-xs">Hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endforeach ?>
            </body>
        </table>
        <a href="?page=pages/produk/view" class="btn btn-success">Pesan lagi </a>
        <a href="?page=pages/pemesan/checkout" class="btn btn-primary">CheckOut </a>
    </div>


</section>
<br>
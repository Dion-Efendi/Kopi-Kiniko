<?php
$iddetail = $_GET['iddetail'];
$data = $koneksi->query("SELECT * FROM tbl_produk WHERE produk_id='$iddetail'")->fetch_assoc();
// var_dump($data);
?>
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">
                <a href="?page=pages/produk/view">Produk</a>
            </li>
            <li class="active">Detail Produk</li>
        </ol>
    </div>
</div>
<br>
<section id="detal" class="detail">
    <div class="container" data-aos="fade-up">

        <!-- <div class="section-title">
            <p>Sambutan Pak Kepala Sekolah</p>
        </div> -->

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                <img width="500" width="500" src="admin/dist/img/imgproduk/<?= $data['produk_foto'] ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3><?= $data['produk_nama'] ?></h3>
                <hr>
                <p class="font-italic">
                    Rp. <?= number_format($data['produk_harga']) ?>
                </p>
                <hr>
                <p>
                    Stok <?= $data['produk_stok'] ?>
                </p>
                <hr>
                <!-- <div>
                    <table border="1">
                        <?php

                        $ongkir = $koneksi->query("SELECT * FROM tbl_ongkir");



                        ?>
                        <tr>
                            Pengiriman Ke
                            <td>
                                <div class="form-group">

                                    <select name="kat" class="form-control">
                                        <option value="">Silahkan Pilih</option>
                                        <?php
                                        foreach ($ongkir as $pecah) :
                                        ?>
                                            <option value="<?= $pecah['ongkir_id'] ?>"><?= $pecah['ongkir_kota'] ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            harga
                        </tr>
                        <td>

                        </td>

                    </table>
                </div> -->
                <!-- <br>
                <hr> -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Keterangan Produk
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #fe9126; color : white;">
                                <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?= $data['produk_keterangan'] ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" min="1" class="form-control " name="jumlah" placeholder="masukan jumlah yang mau anda pesan" max="<?= $data['produk_stok'] ?>">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" name="pesan">Pesan now</button>
                                <!-- <a href="?page=pages/pemesan/view&id=<?= $data['produk_id'] ?>" data-toggle="tooltip" title="Silahkan Beli" class="btn btn-warning mr-2"><i class="">Pesan</i></a> -->
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                //jika ada tombol beli
                if (isset($_POST["pesan"])) {
                    //mendapatkan jumlah yang di inputkan
                    $jumlah = $_POST["jumlah"];
                    //masukan di pemesaanan 
                    $_SESSION["pemesan"][$iddetail] = $jumlah;

                    echo "<script>alert('produk telah masuk ke pemesanan');</script>";
                    echo "<script>location='?page=pages/pemesan/view';</script>";
                }


                ?>

            </div>
            <br>
            <br>
            <!-- <div class="col-lg-10">
                <h3>Deskripsi Barang</h3>
                <p><?= $data['produk_keterangan'] ?></p>
            </div> -->
        </div>

    </div>
</section>
<br>
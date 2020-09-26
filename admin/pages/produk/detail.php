<?php

$iddetail = $_GET['detail'];

$datadetail = $koneksi->query("SELECT * FROM tbl_produk WHERE produk_id ='$iddetail'")->fetch_assoc();
// var_dump($datadetail);
// die;
?>

<div class="content-wrapper">
    <div class="content-header bg-link bg-light">
        <div class="container-fluid">
            <div class="row mb-2" mb-2>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-dark" href="?page=home">Home</a></li>
                        <li class="breadcrumb-item active"><a class="text-dark" href="?page=pages/produk/view">Produk</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section id="services" class="services section-bg">
        <div class="container">
            <div class="row">


                <div class="col-md-9">

                    <!-- <div class="card mb-9"> -->
                    <div class="card">
                        <div class="card-header">
                            <img height="450" src="dist/img/imgproduk/<?= $datadetail['produk_foto']; ?>" alt="">
                        </div>

                        <div class="card-body">
                            <h4><?= $datadetail['produk_nama'] ?></h4>
                            <p>
                                Harga Produk :
                                <br> Rp.<?= $datadetail['produk_harga'] ?>
                            </p>
                            <p>
                                Berat Produk :
                                <br><?= $datadetail['produk_berat'] ?> Gr
                            </p>
                            <p class="text-justify">
                                <?= $datadetail['produk_keterangan'] ?>
                            </p>

                        </div>
                    </div>
                    <!-- </div> -->

                </div>
                <div class="col-md-3">
                    <?php
                    $data =  $koneksi->query("SELECT * FROM tbl_produk");
                    foreach ($data as $pecah) :
                    ?>


                        <div class="card mb-3">
                            <img height="200" white="200" src="dist/img/imgproduk/<?= $pecah['produk_foto'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $pecah['produk_nama'] ?></h5><br>
                                <p><?= substr($pecah['produk_keterangan'], 0, 50) ?></p>
                                <a href="?page=pages/produk/detail&detail=<?= $pecah['produk_id'] ?>">Baca...</a>
                            </div>

                        </div>


                    <?php
                    endforeach;
                    ?>

                </div>


            </div>
        </div>
    </section>





</div>
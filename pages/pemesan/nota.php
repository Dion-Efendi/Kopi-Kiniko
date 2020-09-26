<!-- <br>
<section class="konten">
    <div class="container">


        <h2>Nota Pemesanan</h2>
        <br>

        <?php
        $id = $_GET['id'];
        $ambil = $koneksi->query("SELECT * FROM tbl_pemesanan JOIN tbl_pelanggan
	ON tbl_pemesanan.pelanggan_id=tbl_pelanggan.pelanggan_id
	WHERE tbl_pemesanan.pemesanan_id='$id'");
        $detail = $ambil->fetch_assoc();
        ?>






        <div class="row">
            <div class="col-md-4">
                <h3>Pembelian</h3>
                <strong>No. Pembelian: <?php echo $detail['pemesanan_id']; ?> </strong><br>
                Tanggal: <?php echo $detail['pemesanan_tanggal']; ?> <br>
                Total : <?php echo number_format($detail['pemesanan_total']) ?>

            </div>
            <div class="col-md-4">
                <h3>Pelanggan</h3>
                <strong><?php echo $detail['pelanggan_nama']; ?></strong> <br>
                <p>
                    <?php echo $detail['pelanggan_hp']; ?> <br>
                    <?php echo $detail['pelanggan_email']; ?>
                </p>
            </div>
            <div class="col-md-4">
                <h3>Pengiriman</h3>
                <strong><?php echo $detail['ongkir_kota']; ?></strong> <br>
                Ongkos Kirim: Rp. <?php echo number_format($detail['ongkir_tarif']) ?> <br>
                Alamat : <?php echo $detail['alamat_pengirim'] ?>

            </div>



        </div>





        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama produk</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Jumlah</th>

                    <th>Subtotal</th>

                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM tbl_pembelian WHERE pemesanan_id='$id'"); ?>
                <?php while ($pecah = $ambil->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['produk_nama']; ?> </td>
                        <td>Rp. <?php echo number_format($pecah['produk_harga']); ?> </td>
                        <td><?php echo $pecah['panjang']; ?> Gr </td>
                        <td><?php echo $pecah['jumlah']; ?> </td>

                        <td>Rp. <?php echo number_format($pecah['sub_harga']); ?></td>

                    </tr>
                    <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                    <p>
                        silahkan melakukan pembayaran Rp. <?php echo number_format($detail['pemesanan_total']); ?> ke <br>
                        <strong>BANK BNI 137-001088-3276 AN. Rahmat Efendi</strong>
                        <br>
                        <br>
                        Silahkan cetak nota ini<br>
                        dan kirim bukti transfer ke no WhatsApp kami: <strong>081230725097</strong>
                    </p>
                    <a href="javascript:window.print()" class="btn btn-success">Print </a>



                </div>



            </div>
        </div>





    </div>

</section> -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">
                <a href="?page=pages/pemesan/view">Pemesanan</a>
            </li>
            <li class="active">
                Nota
            </li>
        </ol>
    </div>
</div>
<br>
<br>
<section class="konten">
    <div class="container">
        <div class="card ml-3 mr-3">
            <h2>Nota Pemesan</h2>
            <hr>
            <br>
            <?php
            $id = $_GET['id'];
            $ambil = $koneksi->query("SELECT * FROM tbl_pemesanan JOIN tbl_pelanggan
	      ON tbl_pemesanan.pelanggan_id=tbl_pelanggan.pelanggan_id
	      WHERE tbl_pemesanan.pemesanan_id='$id'");
            $data = $ambil->fetch_assoc();
            ?>



            <div class="row mt-3 ml-3">
                <div class="col-md-1">
                    <label for="">Nama Pemesan</label>
                </div>
                <div class="col-md-4">
                    <input readonly type="text" class="form-control" cols="38" value=" <?= $data['pelanggan_nama'] ?>">
                </div>
                <div class="col-md-2 ml-5">
                    <label for="">Tanggal Memesan</label>
                </div>
                <div class="col-md-4">
                    <input readonly type="text" class="form-control" cols="38" value=" <?= $data['pemesanan_tanggal'] ?>">
                </div>
            </div>



            <div class="row mt-3 ml-3">
                <div class="col-md-1">
                    <label for="">No Telepon</label>
                </div>
                <div class="col-md-4">
                    <input readonly type="text" class="form-control" cols="38" value=" <?= $data['pelanggan_hp'] ?>">
                </div>
                <div class="col-md-2 ml-5">
                    <label for="">Alamat Ongkir</label>
                </div>
                <div class="col-md-4">
                    <input readonly type="text" class="form-control" cols="38" value=" <?= $data['ongkir_kota'] ?>">
                </div>
            </div>


            <div class="row mt-3 ml-3">
                <div class="col-md-1">
                    <label for="">Email</label>
                </div>
                <div class="col-md-4">
                    <input readonly type="text" class="form-control" cols="38" value=" <?= $data['pelanggan_email'] ?>">
                </div>
                <div class="col-md-2 ml-5">
                    <label for="">Alamat Pemesan</label>
                </div>
                <div class="col-md-4">
                    <input readonly type="text" class="form-control" cols="38" value=" <?= $data['alamat_pengirim'] ?>">
                </div>
            </div>
            <br>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id='example1' style="text-align: center;">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nomor Produk</th>
                                <th style="text-align: center;">Harga Produk</th>
                                <th style="text-align: center;">Jumlah Produk</th>
                                <th style="text-align: center;">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $id = $_GET['id'];
                            $dt = $koneksi->query("SELECT * FROM tbl_pembelian JOIN tbl_produk ON tbl_pembelian.produk_id = tbl_produk.produk_id WHERE tbl_pembelian.pemesanan_id='$id'");

                            foreach ($dt as $no => $pecah) :
                            ?>
                                <tr>
                                    <td><?= ++$no; ?></td>
                                    <td><?= $pecah['produk_nama']; ?> </td>
                                    <td>Rp.<?= number_format($pecah['produk_harga']); ?> </td>
                                    <td><?= $pecah['jumlah']; ?> </td>
                                    <td> Rp.
                                        <?= number_format($pecah['produk_harga'] * $pecah['jumlah']); ?>
                                    </td>
                                </tr>

                            <?php
                            endforeach;
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: center;">Total Semua</th>
                                <th style="text-align: center;">Rp. <?= number_format($data['pemesanan_total']) ?></th>
                            </tr>
                        </tfoot>
                        <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: center;">Tarif Ongkir</th>
                                <th style="text-align: center;">Rp. <?= number_format($data['ongkir_tarif']) ?></th>
                            </tr>
                        </tfoot>

                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <p>
                                    silahkan melakukan pembayaran Rp. <?php echo number_format($detail['pemesanan_total']); ?> ke <br>
                                    <strong>BANK BNI 137-001088-3276 AN. Dion Efendi</strong><br>
                                    Silahkan cetak nota ini<br>
                                    dan kirim bukti transfer ke no WhatsApp kami: <strong>081230725097</strong>
                                </p>
                                <br>
                                <a href="javascript:window.print()" class="btn btn-success">Print </a>
                                <br>
                                <br>
                                <h5>ATAU BAYAR DI TEMPAT</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
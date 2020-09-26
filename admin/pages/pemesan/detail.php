<!-- <div class="content-wrapper">
    <div class="content-header bg-link bg-light">
        <div class="container-fluid">
            <div class="row mb-2" mb-2>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Pemesan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-dark" href="?page=home">Home</a></li>
                        <li class="breadcrumb-item active"><a class="text-dark" href="?page=pages/pemesan/view">Pemesan</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card ml-3 mr-3">

        <?php

        $id = $_GET['iddetail'];
        // var_dump($id);
        // die;#
        $query = "SELECT * FROM tbl_pemesanan INNER JOIN tbl_pelanggan ON tbl_pemesanan.pelanggan_id = tbl_pelanggan.pelanggan_id WHERE tbl_pelanggan.pelanggan_id = '$id'  ";
        $data = $koneksi->query($query)->fetch_assoc();
        // var_dump($data);
        // die;


        ?>
        <div class="row mt-3 ml-3">
            <div class="col-md-2">
                Nama
            </div>
            <div class="col-md-4">
                : <?= $data['pelanggan_nama'] ?>
            </div>
        </div>
        <div class="row mt-3 ml-3">
            <div class="col-md-2">
                No HP
            </div>
            <div class="col-md-4">
                : <?= $data['pelanggan_hp'] ?>
            </div>
        </div>
        <div class="row mt-3 ml-3">
            <div class="col-md-2">
                Email
            </div>
            <div class="col-md-4">
                : <?= $data['pelanggan_email'] ?>
            </div>
        </div>
        <div class="row mt-3 ml-3">
            <div class="col-md-2">
                Tanggal Memesan
            </div>
            <div class="col-md-4">
                : <?= $data['pemesanan_tanggal'] ?>
            </div>
        </div>
        <div class="row mt-3 ml-3">
            <div class="col-md-2">
                Total Memesan
            </div>
            <div class="col-md-4">
                : <?= $data['pemesanan_total'] ?>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id='example1' style="text-align: center;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Produk</th>
                            <th>Harga Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $id = $_GET['iddetail'];
                        $dt = $koneksi->query("SELECT * FROM tbl_pembelian JOIN tbl_produk ON tbl_pembelian.produk_id = tbl_produk.produk_id WHERE tbl_pembelian.pemesanan_id='$id'");

                        foreach ($dt as $no => $pecah) :
                        ?>
                            <tr>
                                <td><?= ++$no; ?></td>
                                <td><?= $pecah['produk_nama']; ?> </td>
                                <td><?= $pecah['produk_harga']; ?> </td>
                                <td><?= $pecah['jumlah']; ?> </td>
                                <td>
                                    <?= $pecah['produk_harga'] * $pecah['jumlah']; ?>
                                </td>
                            </tr>

                        <?php
                        endforeach;
                        ?>

                    </tbody>
                </table>
                <a href="javascript:window.print()" class="btn btn-success">cetak </a>
            </div>
        </div>




    </div>
</div> -->
<div class="content-wrapper">
    <div class="content-header bg-link bg-light">
        <div class="container-fluid">
            <div class="row mb-2" mb-2>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Pemesan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-dark" href="?page=home">Home</a></li>
                        <li class="breadcrumb-item active"><a class="text-dark" href="?page=pages/pemesan/view">Pemesan</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card ml-3 mr-3">

        <?php
        $id = $_GET['iddetail'];
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
                <input readonly type="text" class="form-control" cols="38" value=" <?= date('d F Y', strtotime($data['pemesanan_tanggal']))  ?>">
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
                        <tr>
                            <th>No</th>
                            <th>Nomor Produk</th>
                            <th>Harga Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $id = $_GET['iddetail'];
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
                            <th colspan="4">Total Semua</th>
                            <th>Rp. <?= number_format($data['pemesanan_total']) ?></th>
                        </tr>
                    </tfoot>
                    <tfoot>
                        <tr>
                            <th colspan="4">Tarif Ongkir</th>
                            <th>Rp. <?= number_format($data['ongkir_tarif']) ?></th>
                        </tr>
                    </tfoot>

                </table>
                <a href="javascript:window.print()" class="btn btn-success">cetak </a>
            </div>
        </div>
    </div>
</div>
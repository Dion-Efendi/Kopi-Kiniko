<div class="content-wrapper">
    <div class="content-header bg-link bg-light">
        <div class="container-fluid">
            <div class="row mb-2" mb-2>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pemesan</h1>
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
        <!-- <div class="card-header bg-primary">
            <h1>Tabel Produk</h1>
        </div> -->

        <div class="card-body">
            <div class="table-responsive">
                Bulan
                <select name="bulan">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="12">November</option>
                    <option value="12">Desember</option>
                </select>
                Tahun
                <select name="tahun">
                    <?php
                    $mulai = date('Y') - 50;
                    for ($i = $mulai; $i < $mulai + 100; $i++) {
                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                    }
                    ?>
                </select>
                <button type="submit">Proses</button>
                <br>
                <br>
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Laporan Perbulan
                </button> -->

                <!-- Modal -->
                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <thead class="btn-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Pemesan</th>
                                            <th>Nomor Pelanggan</th>
                                            <th>Tanggal Pemesan</th>
                                            <th>Ongkir Kota</th>
                                            <th>Ongkir Tarif</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        <?php



                                        $query = "SELECT * FROM tbl_pemesanan";
                                        $query = mysqli_query($koneksi, $query);
                                        $a = [];
                                        while ($rows = mysqli_fetch_assoc($query)) {
                                            $n = date('m');
                                            $bulan = explode('-', $rows['pemesanan_tanggal'])[1];
                                            if ($bulan == $n) {
                                                $a[] = $rows;
                                            }
                                        }




                                        foreach ($a as $no => $pecah) :

                                        ?>
                                            <tr>
                                                <td><?= ++$no ?></td>
                                                <td> <?= $pecah['pemesanan_id'] ?> </td>
                                                <td> <?= $pecah['pelanggan_id'] ?> </td>
                                                <td> <?= date('d F Y', strtotime($pecah['pemesanan_tanggal']))  ?> </td>
                                                <td> <?= $pecah['ongkir_kota'] ?> </td>
                                                <td> Rp. <?= number_format($pecah['ongkir_tarif']) ?> </td>
                                                <td> <?= $pecah['status'] ?> </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br> -->


                <table class="table table-bordered" id='example1' style="text-align: center;">
                    <thead class="btn-primary">
                        <tr>
                            <th>No</th>
                            <!-- <th>Nomor Pemesan</th>
                            <th>Nomor Pelanggan</th> -->
                            <th>Tanggal Pemesan</th>
                            <th>Ongkir Kota</th>
                            <th>Totol Belanja</th>
                            <!-- <th>Status</th> -->
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>



                        <?php

                        // $data = $koneksi->query("SELECT * FROM tbl_pemesanan");

                        // $bulan = $_POST['bulan'];
                        // $tahun = $_POST['tahun'];
                        // $sql = "SELECT * FROM tbl_pemesanan WHERE month(waktu)='$bulan' and year(waktu) = '$tahun'";
                        // die;


                        //
                        $query = "SELECT * FROM tbl_pemesanan ";
                        $query = mysqli_query($koneksi, $query);
                        $jdata = mysqli_num_rows($query);
                        $a = [];
                        while ($rows = mysqli_fetch_assoc($query)) {
                            $n = date('m');
                            $bulan = explode('-', $rows['pemesanan_tanggal'])[1];
                            if ($bulan == $n) {
                                $a[] = $rows;
                            }
                        }

                        $total = 0;
                        for ($i = 0; $i <= count($a) - 1; $i++) {
                            $total += $a[$i]['pemesanan_total'];
                        }

                        foreach ($a as $no => $pecah) :
                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <!-- <td> <?= $pecah['pemesanan_id'] ?> </td>
                                <td> <?= $pecah['pelanggan_id'] ?> </td> -->
                                <td> <?= date('d F Y', strtotime($pecah['pemesanan_tanggal']))  ?> </td>
                                <td> <?= $pecah['ongkir_kota'] ?> </td>
                                <td> Rp. <?= number_format($pecah['pemesanan_total']) ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total Semua</th>
                            <!-- <td>Rp. <?= number_format($pecah['pemesanan_total']) ?></td> -->
                            <td>Rp.<?= number_format($total) ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
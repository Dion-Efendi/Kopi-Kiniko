<div class="content-wrapper">
    <div class="content-header bg-link bg-light">
        <div class="container-fluid">
            <div class="row mb-2" mb-2>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ongkir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-dark" href="?page=home">Home</a></li>
                        <li class="breadcrumb-item active"><a class="text-dark" href="?page=pages/ongkir/view">Ongkir</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>



    <div class="card ml-3 mr-3">


        <div class="card-body">
            <div class="table-responsive">

                <button data-toggle="modal" title=" Tambah Data" data-target="#tambah" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i>Tambah Data</button>

                <table class="table table-bordered" id='example1' style="text-align: center;">
                    <thead>
                        <tr class="bg-primary">
                            <th>No</th>
                            <th>Nama Kota</th>
                            <th>Tarif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php

                        $data = $koneksi->query("SELECT * FROM tbl_ongkir");
                        // var_dump($dataadmin);
                        // exit;

                        foreach ($data as $no => $pecah) :

                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td> <?= $pecah['ongkir_kota'] ?> </td>
                                <td>Rp.<?= number_format($pecah['ongkir_tarif']) ?> </td>

                                <td>
                                    <a href="?page=pages/ongkir/edit&eedit=<?= $pecah['ongkir_id'] ?>" data-toggle="tooltip" title="Edit Ongkir" class="btn btn-warning btn-sm"><i class="fa fa-edit text-white"></i> </a><br>

                                    <a style="display: inline" onclick="return confirm('Apa Anda Yakin Ingin Menghapus ?')" href="?page=pages/ongkir/hapus&hhapus=<?= $pecah['ongkir_id'] ?>" data-toggle="tooltip" title="Hapus Ongkir" class="btn btn-danger btn-sm"><i class="fa fa-trash mt-3 mb-3"></i></a><br>

                                    <!-- <a href="?page=pages/produk/detail&detail=<?= $pecah['produk_id'] ?>" data-toggle="tooltip" title="Detail Produk" class="btn btn-success btn-sm"><i class="fa fa-search text-white"></i> Detial</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title " id="exampleModalLabel">Tambah Data Ongkir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kota</label>
                        <input type="text" name="kota" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tarif</label>
                        <input type="number" name="tarif" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="ok">Simpan</button>
            </div>
            </form>

            <?php

            if (isset($_POST['ok'])) {
                $kota       =  $_POST['kota'];
                $tarif      =  $_POST['tarif'];

                $simpan = $koneksi->query("INSERT INTO tbl_ongkir (ongkir_kota,
                ongkir_tarif) VALUES('$kota','$tarif')");

                if ($simpan == TRUE) {
                    echo "<script>
                       alert ('Data Berhasil Di Simpan')
                       window.location= '?page=pages/ongkir/view'
                      </script>";
                } else {
                    echo "<script>
                      alert ('Data Gagal Di Simpan')
                      window.location= '?page=pages/ongkir/view'
                     </script>";
                }
            }




            ?>

        </div>
    </div>
</div>
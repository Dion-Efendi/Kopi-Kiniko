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



    <div class="card ml-3 mr-3">
        <!-- <div class="card-header bg-primary">
            <h1>Tabel Produk</h1>
        </div> -->

        <div class="card-body">
            <div class="table-responsive">

                <button data-toggle="modal" title=" Tambah Data" data-target="#tambah" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i>Tambah Data</button>

                <table class="table table-bordered" id='example1' style="text-align: center;">
                    <thead class="btn-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Berat Produk</th>
                            <!-- <th>Keterangan Produk</th> -->
                            <th>Stok Produk</th>
                            <!-- <th>Foto Produk</th> -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php

                        $data = $koneksi->query("SELECT * FROM tbl_Produk");
                        // var_dump($dataadmin);
                        // exit;

                        foreach ($data as $no => $pecah) :

                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td> <?= $pecah['produk_nama'] ?> </td>
                                <td>Rp.<?= $pecah['produk_harga'] ?> </td>
                                <td> <?= $pecah['produk_berat'] ?> Gr </td>
                                <!-- <td> <?= $pecah['produk_keterangan'] ?> </td> -->
                                <td> <?= $pecah['produk_stok'] ?> </td>
                                <!-- <td>

                                    <img width="100" height="100" src="dist/img/imgproduk/<?= $pecah['produk_foto']; ?>" alt="">

                                </td> -->

                                <td>
                                    <a href="?page=pages/produk/edit&idedit=<?= $pecah['produk_id'] ?>" data-toggle="tooltip" title="Edit Produk" class="btn btn-warning btn-sm"><i class="fa fa-edit text-white"></i> </a><br>

                                    <a style="display: inline" onclick="return confirm('Apa Anda Yakin Ingin Menghapus ?')" href="?page=pages/produk/hapus&idhapus=<?= $pecah['produk_id'] ?>" data-toggle="tooltip" title="Hapus Produk" class="btn btn-danger btn-sm"><i class="fa fa-trash mt-3 mb-3"></i> </a><br>

                                    <a href="?page=pages/produk/detail&detail=<?= $pecah['produk_id'] ?>" data-toggle="tooltip" title="Detail Produk" class="btn btn-success btn-sm"><i class="fa fa-search text-white"></i></a>
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
                <h5 class="modal-title " id="exampleModalLabel">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Harga Produk (Rp)</label>
                        <input type="number" name="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Berat Produk (Gr)</label>
                        <input type="number" name="berat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Keterangan Produk</label>
                        <textarea name="ket" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Stok Produk</label>
                        <input type="number" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Foto Produk</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            </div>
            </form>

            <?php

            if (isset($_POST['simpan'])) {
                $nama       =  $_POST['nama'];
                $harga      =  $_POST['harga'];
                $berat      =  $_POST['berat'];
                $ket        =  $_POST['ket'];
                $stok       =  $_POST['stok'];

                $namafoto   = $_FILES['foto']['name'];
                $lokasifoto = $_FILES['foto']['tmp_name'];

                move_uploaded_file($lokasifoto, "dist/img/imgproduk/" . $namafoto);

                $simpan = $koneksi->query("INSERT INTO tbl_produk (produk_nama,
                    produk_harga,
                    produk_berat,
                    produk_keterangan,
                    produk_stok,
                    produk_foto) VALUES('$nama','$harga','$berat','$ket','$stok','$namafoto')");

                if ($simpan == TRUE) {
                    echo "<script>
                       alert ('Data Berhasil Di Simpan')
                       window.location= '?page=pages/produk/view'
                      </script>";
                } else {
                    echo "<script>
                      alert ('Data Gagal Di Simpan')
                      window.location= '?page=pages/produk/view'
                     </script>";
                }
            }




            ?>

        </div>
    </div>
</div>
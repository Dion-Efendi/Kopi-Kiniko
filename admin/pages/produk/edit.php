<div class="content-wrapper">
    <div class="content-header bg-link bg-light">
        <div class="container-fluid">
            <div class="row mb-2" mb-2>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Ubah Produk</h1>
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
    <?php

    $id = $_GET['idedit'];
    $dataedit = $koneksi->query("SELECT * FROM tbl_produk WHERE produk_id='$id'")->fetch_assoc();
    // var_dump($dataedit);

    ?>


    <div class="card ml-3 mr-3">
        <div class="card-body">

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama" class="form-control" value="<?= $dataedit['produk_nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Harga Produk</label>
                    <input type="number" name="harga" class="form-control" value="<?= $dataedit['produk_harga']; ?>">
                </div>
                <div class="form-group">
                    <label>Berat Produk</label>
                    <input type="number" name="berat" class="form-control" value="<?= $dataedit['produk_berat']; ?>">
                </div>
                <div class="form-group">
                    <label>Isi Berita</label>
                    <textarea cols="30" rows="5" type="text" name="ket" class="form-control"><?= $dataedit['produk_keterangan']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Stok Produk</label>
                    <input type="number" name="stok" class="form-control" value="<?= $dataedit['produk_stok']; ?>">
                </div>

                <div class="form-group">
                    <img class="mx-auto d-block rounded-circle" width="250" src="dist/img/imgproduk/<?= $dataedit['produk_foto']; ?>" alt="">
                    <input readonly type="text" class="form-control" name="fotolama" value="<?= $dataedit['produk_foto'] ?>">
                </div>

                <div class="form-group">
                    <label>Foto Produk</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" name="edit" class="btn btn-warning btn-block">Simpan</button>
            </form>


            <?php

            if (isset($_POST['edit'])) {
                $nama       =  $_POST['nama'];
                $harga      =  $_POST['harga'];
                $berat      =  $_POST['berat'];
                $ket        =  $_POST['ket'];
                $stok       =  $_POST['stok'];

                $fotolama   = $_POST['fotolama'];
                $namafoto   = $_FILES['foto']['name'];
                $lokasifoto = $_FILES['foto']['tmp_name'];

                if (!empty($lokasifoto)) {
                    unlink('dist/img/imgproduk/' . $fotolama);
                    move_uploaded_file($lokasifoto, "dist/img/imgproduk/" . $namafoto);

                    $edit = $koneksi->query("UPDATE tbl_produk SET produk_nama='$nama',
                    produk_harga='$harga',
                    produk_berat='$berat',
                    produk_keterangan='$ket',
                    produk_stok='$stok',
                    produk_foto='$namafoto' WHERE produk_id='$id'");
                } else {
                    $edit =  $koneksi->query("UPDATE tbl_produk SET produk_nama='$nama',
                    produk_harga='$harga',
                    produk_berat='$berat',
                    produk_keterangan='$ket',
                    produk_stok='$stok' WHERE produk_id='$id'");
                }

                if ($edit == TRUE) {
                    echo "<script>
                        alert ('Data Berhasil Di Simpan');
                        window.location= '?page=pages/produk/view'
                        </script>";
                } else {
                    echo "<script>
                        alert ('Data Gagal Di Simpan');
                        window.location= '?page=pages/produk/edit'
                    </script>";
                }
            }



            ?>







        </div>
    </div>
</div>
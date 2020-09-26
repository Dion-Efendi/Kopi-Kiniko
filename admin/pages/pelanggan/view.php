<div class="content-wrapper">
    <div class="content-header bg-link bg-light">
        <div class="container-fluid">
            <div class="row mb-2" mb-2>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pelanggan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a class="text-dark" href="?page=home">Home</a></li>
                        <li class="breadcrumb-item active"><a class="text-dark" href="?page=pages/pelanggan/view">Pelanggan</a>
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
                            <th>Nomor Pelanggan</th>
                            <th>Email Pelanggan</th>
                            <!-- <th>Password Pelanggan</> -->
                            <th>Nama Pelanggan</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>



                        <?php

                        $data = $koneksi->query("SELECT * FROM tbl_pelanggan");
                        // var_dump($dataadmin);
                        // exit;

                        foreach ($data as $no => $pecah) :

                        ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td> <?= $pecah['pelanggan_id'] ?> </td>
                                <td><?= $pecah['pelanggan_email'] ?> </td>
                                <!-- <td> <?= md5($pecah['pelanggan_pass']) ?></td> -->
                                <td> <?= $pecah['pelanggan_nama'] ?> </td>
                                <td> <?= $pecah['pelanggan_hp'] ?> </td>
                                <!-- <td>

                                    <img width="100" height="100" src="dist/img/imgproduk/<?= $pecah['produk_foto']; ?>" alt="">

                                </td> -->

                                <td>
                                    <a href="?page=pages/pelanggan/edit&edit=<?= $pecah['pelanggan_id'] ?>" data-toggle="tooltip" title="Edit Pelanggan" class="btn btn-warning btn-sm"><i class="fa fa-edit text-white"></i> </a><br>

                                    <a style="display: inline" onclick="return confirm('Apa Anda Yakin Ingin Menghapus ?')" href="?page=pages/pelanggan/hapus&idhapus=<?= $pecah['pelanggan_id'] ?>" data-toggle="tooltip" title="Hapus Pelanggan" class="btn btn-danger btn-sm"><i class="fa fa-trash mt-3 mb-3"></i></a><br>

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
                <h5 class="modal-title " id="exampleModalLabel">Tambah Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" name="hp" class="form-control">
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
                $email      =  $_POST['email'];
                $pass       =  md5($_POST['password']);
                $hp         =  $_POST['hp'];

                $simpan = $koneksi->query("INSERT INTO tbl_pelanggan (pelanggan_nama,
                   pelanggan_email,
                   pelanggan_pass,
                   pelanggan_hp) VALUES('$nama','$email','$pass','$hp')");

                if ($simpan == TRUE) {
                    echo "<script>
                       alert ('Data Berhasil Di Simpan')
                       window.location= '?page=pages/pelanggan/view'
                      </script>";
                } else {
                    echo "<script>
                      alert ('Data Gagal Di Simpan')
                      window.location= '?page=pages/pelanggan/view'
                     </script>";
                }
            }




            ?>

        </div>
    </div>
</div>
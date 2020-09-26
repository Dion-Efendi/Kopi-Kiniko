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
    <?php

    $id = $_GET['edit'];
    $dataedit = $koneksi->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_id='$id'")->fetch_assoc();
    // var_dump($dataedit);
    // die;

    ?>


    <div class="card ml-3 mr-3">
        <div class="card-body">

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $dataedit['pelanggan_nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $dataedit['pelanggan_email']; ?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" value="<?= $dataedit['pelanggan_pass']; ?>">
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="number" name="hp" class="form-control" value="<?= $dataedit['pelanggan_hp']; ?>">
                </div>

                <button type="submit" name="simpan" class="btn btn-warning btn-block">Simpan</button>

            </form>
        </div>



        <?php


        if (isset($_POST['simpan'])) {
            $nama     =  $_POST['nama'];
            $email    =  $_POST['email'];
            $pass     =  md5($_POST['pass']);
            $hp       =  $_POST['hp'];
            // echo $nama;
            // exit;
            $edit = $koneksi->query("UPDATE tbl_pelanggan SET pelanggan_nama ='$nama',
            pelanggan_email ='$email',
            pelanggan_pass  ='$pass',
            pelanggan_hp    ='$hp' WHERE pelanggan_id='$id'");

            if ($edit == TRUE) {
                echo "<script>
                       alert ('Data Berhasil Di Simpan');
                        window.location= '?page=pages/pelanggan/view'
                     </script>";
            } else {
                echo "<script>
                    alert ('Data Gagal Di Simpan');
                   window.location= '?page=pages/pelanggan/edit'
                    </script>";
            }
        }



        ?>







    </div>
</div>
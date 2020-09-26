<?php

$id = $_GET['idstatus'];

$status = $koneksi->query("SELECT * FROM tbl_produk WHERE produk_id ='$id'")->fetch_assoc();
// var_dump($datadetail);
// die;
?>

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
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>status</label>
                        <select class="form-control" name="status">
                            <option value="">pilih status</option>
                            <option value="lunas">lunas</option>
                            <option value="barang dikirim">barang dikirim</option>
                            <option value="batal">batal</option>


                        </select>

                    </div>
                    <button class="btn btn-primary" name="ubah">Ganti</button>
                </form>
            </div>
        </div>
    </div>



    <?php

    if (isset($_POST['ubah'])) {
        $status       =  $_POST['status'];


        $ubah = $koneksi->query("UPDATE tbl_pemesanan SET status='$status'
        WHERE pemesanan_id='$id'");


        if ($ubah == TRUE) {
            echo "<script>
            alert ('Data Berhasil Di Simpan');
            window.location= '?page=pages/pemesan/view'
            </script>";
        } else {
            echo "<script>
            alert ('Data Gagal Di Simpan');
            window.location= '?page=pages/pemesan/status'
        </script>";
        }
    }



    ?>

</div>
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

    <?php
    $id = $_GET['eedit'];
    // var_dump($id);
    $dataedit = $koneksi->query("SELECT * FROM tbl_ongkir WHERE ongkir_id='$id'")->fetch_assoc();
    // var_dump($dataedit);
    // die;
    ?>
    <div class="card ml-3 mr-3">
        <div class="card-body">

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Nama Kota</label>
                    <input type="text" name="kota" class="form-control" value="<?= $dataedit['ongkir_kota']; ?>">
                </div>
                <div class="form-group">
                    <label>Tarif</label>
                    <input type="number" name="tarif" class="form-control" value="<?= $dataedit['ongkir_tarif']; ?>">
                </div>

                <button type="submit" name="edit" class="btn btn-warning btn-block">Simpan</button>

            </form>
        </div>



        <?php


        if (isset($_POST['edit'])) {
            $kota    =  $_POST['kota'];
            $tarif    =  $_POST['tarif'];

            $edit = $koneksi->query("UPDATE tbl_ongkir SET ongkir_kota ='$kota',
            ongkir_tarif ='$tarif'
            WHERE ongkir_id='$id'");

            if ($edit == TRUE) {
                echo "<script>
                       alert ('Data Berhasil Di Simpan');
                        window.location= '?page=pages/ongkir/view'
                     </script>";
            } else {
                echo "<script>
                    alert ('Data Gagal Di Simpan');
                   window.location= '?page=pages/ongkir/edit'
                    </script>";
            }
        }



        ?>







    </div>
</div>
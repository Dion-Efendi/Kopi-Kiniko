<!-- <div class="content-wrapper">
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

        <div class="card-body">
            <div class="table-responsive">
                Bulan
                <select name="bulan" id="tgl">
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


                <table class="table table-bordered" id='example1' style="text-align: center;">
                    <thead class="btn-primary">
                        <tr>
                            <th>No</th>
                            <th>Nomor Pemesan</th>
                            <th>Nomor Pelanggan</th>
                            <th>Tanggal Pemesan</th>
                            <th>Ongkir Kota</th>
                            <th>Totol Belanja</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="isi">


                    </tbody>
                </table>
                <script src="dist/axios-master/dist/axios.js"></script>
                <script src="main.js"></script>
            </div>
        </div>
    </div>
</div> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="content-wrapper">
        <div class="content-header bg-link bg-light">
            <div class="container-fluid">
                <div class="row mb-2" mb-2>
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Laporan Pemesan Pertahun</h1>
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

            <div class="card-body">
                <div class="table-responsive">
                    Bulan
                    <select name="tahun" id="tgl">
                        <?php for ($i = 2019; $i <= 2030; $i++) : ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                    </select>
                    <br>
                    <br>

                    <table class="table table-bordered" id='example1' style="text-align: center;">
                        <thead class="btn-primary">
                            <tr>
                                <!-- <th>No</th>
                                <th>Nomor Pemesan</th> -->
                                <th>Nomor Pelanggan</th>
                                <th>Tanggal Pemesan</th>
                                <th>Ongkir Kota</th>
                                <th>Status</th>
                                <th>Totol Belanja</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody id="isi">


                        </tbody>
                    </table>
                    <a href="javascript:window.print()" class="btn btn-success">cetak </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="dist/axios-master/dist/axios.js"></script>
    <script src="dist/main.js"></script> -->
</body>

</html>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Home</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <script src="dist/Chart.js"></script>
  <div class="content">
    <?php include('koneksi/koneksi.php'); ?>
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-md-6">
          <?php
          $label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

          for ($bulan = 1; $bulan < 13; $bulan++) {
            $query = mysqli_query($koneksi, "select sum(pemesanan_total) as jumlah from tbl_pemesanan where MONTH(pemesanan_tanggal)='$bulan'");
            $row = $query->fetch_array();
            $jumlah_produk[] = $row['jumlah'];
          }
          ?>
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Grafik Penjualan Perbulan</h3>
                <a href="?page=pages/laporan/index">Penjualan Perbulan</a>
              </div>
            </div>
            <div class="card-body">
              <div>
                <canvas id="myChart"></canvas>
              </div>


              <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: <?php echo json_encode($label); ?>,
                    datasets: [{
                      label: 'Grafik Penjualan Rp',
                      data: <?= json_encode($jumlah_produk); ?>,
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                          beginAtZero: true
                        }
                      }]
                    }
                  }
                });
              </script>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <?php

          $produk = mysqli_query($koneksi, "select * from tbl_produk");
          while ($row = mysqli_fetch_array($produk)) {
            $nama_produk[] = $row['produk_nama'];

            $query = mysqli_query($koneksi, "select sum(jumlah) as jumlah from tbl_pembelian where produk_id='" . $row['produk_id'] . "'");
            $row = $query->fetch_array();
            $jumlah_produk1[] = $row['jumlah'];
          }
          ?>
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Grafik Jumalah Barang Terjual</h3>
                <a href="?page=pages/produk/view">Penjualan Produk</a>
              </div>
            </div>
            <div class="card-body">
              <div>
                <canvas id="myChart2"></canvas>
              </div>
              <script>
                var ctx = document.getElementById("myChart2").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: <?php echo json_encode($nama_produk); ?>,
                    datasets: [{
                      label: 'Grafik Penjualan Barang',
                      data: <?php echo json_encode($jumlah_produk1); ?>,
                      backgroundColor: 'rgba(255, 99, 132, 0.2)',
                      borderColor: 'rgba(255,99,132,1)',
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                          beginAtZero: true
                        }
                      }]
                    }
                  }
                });
              </script>
            </div>
          </div>
        </div>


        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">

              <?php

              $ambil = $koneksi->query("SELECT  COUNT(*) FROM tbl_pemesanan");
              $pecah = $ambil->fetch_assoc();

              ?>

              <h3><?= $pecah['COUNT(*)'] ?></h3>

              <p>Pemesan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="?page=pages/pemesan/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php

              $ambil = $koneksi->query("SELECT  COUNT(*) FROM tbl_produk");
              $pecah = $ambil->fetch_assoc();

              ?>

              <h3><?= $pecah['COUNT(*)'] ?></h3>

              <p>Produk</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?page=pages/produk/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">

              <?php

              $ambil = $koneksi->query("SELECT  COUNT(*) FROM tbl_pelanggan");
              $pecah = $ambil->fetch_assoc();

              ?>

              <h3><?= $pecah['COUNT(*)'] ?></h3>

              <p>Pelanggan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=pages/pelanggan/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php

              $ambil = $koneksi->query("SELECT  COUNT(*) FROM tbl_ongkir");
              $pecah = $ambil->fetch_assoc();

              ?>
              <h3><?= $pecah['COUNT(*)'] ?></h3>

              <p>Ongkir</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="?page=pages/ongkir/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
  </section>





  <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
  <!-- Bootstrap -->
  <!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- AdminLTE -->
  <!-- <script src="dist/js/adminlte.js"></script> -->

  <!-- OPTIONAL SCRIPTS -->
  <!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
  <!-- <script src="dist/js/demo.js"></script> -->

</div>
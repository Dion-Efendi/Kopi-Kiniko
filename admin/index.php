<?php

include "koneksi/koneksi.php";
session_start();

if (empty($_SESSION['admin'])) {
  echo "<script>
    alert('Silahkan Login Terlebih Dahulu');
    window.location = 'login.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'components/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <script src="plugins/jquery/jquery.min.js"></script>
  <div class="wrapper">
    <!-- Navbar -->
    <?php
    include 'components/navbar.php';
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link bg-blue">
        <img src="dist/img/logo.gif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8 ">
        <span class="brand-text font-weight-light">Kopi Kiniko</span>
      </a>

      <!-- Sidebar -->
      <?php
      include 'components/sidebar.php';
      ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <?php
    include 'content.php';
    ?>
    <!-- /.row -->


    <!-- /.row -->
    <!--/. container-fluid -->

    <!-- /.content -->

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php
    include 'components/footer.php';
    ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <?php
  include 'components/script.php';
  ?>

  <script src="dist/axios-master/dist/axios.js"></script>
  <script src="dist/main.js"></script>
</body>

</html>
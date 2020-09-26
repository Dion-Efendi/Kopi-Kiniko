<div class="sidebar bg-white">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="dist/img/1.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <?= $_SESSION['admin']['admin_nama'] ?>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="?page=home" class="nav-link  <?php echo ($_GET['page'] == 'home') ? 'active' : '' ?> ">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Home
                        <i class="right"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?page=pages/pemesan/view" class="nav-link  <?php echo ($_GET['page'] == 'pages/pemesan/view' || isset($_GET['idstatus']) || $_GET['iddetail']) ? 'active' : '' ?> ">
                    <i class="fas fa-shopping-cart"></i>
                    <p>
                        Pemesan
                        <i class="right"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?page=pages/produk/view" class="nav-link <?php echo ($_GET['page'] == 'pages/produk/view' || isset($_GET['idedit']) || $_GET['detail']) ? 'active' : '' ?> ">
                    <i class="fab fa-product-hunt"></i>
                    <p>
                        Produk
                        <i class="right"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?page=pages/pelanggan/view" class="nav-link  <?php echo ($_GET['page'] == 'pages/pelanggan/view' || isset($_GET['edit'])) ? 'active' : '' ?> ">
                    <i class="fas fa-address-book"></i>
                    <p>
                        Pelanggan
                        <i class="right"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?page=pages/ongkir/view" class="nav-link  <?php echo ($_GET['page'] == 'pages/ongkir/view' || isset($_GET['eedit'])) ? 'active' : '' ?> ">
                    <i class="fas fa-search-location"></i>
                    <p>
                        Ongkir
                        <i class="right"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?page=pages/laporan/index" class="nav-link  <?php echo ($_GET['page'] == 'pages/laporan/index' || isset($_GET[''])) ? 'active' : '' ?> ">
                    <i class="fas fa-book-reader"></i>
                    <p>
                        Laporan perbulan
                        <i class="right"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?page=pages/laporan2/index" class="nav-link  <?php echo ($_GET['page'] == 'pages/laporan2/index' || isset($_GET[''])) ? 'active' : '' ?> ">
                    <i class="fas fa-book"></i>
                    <p>
                        Laporan Pertahun
                        <i class="right"></i>
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
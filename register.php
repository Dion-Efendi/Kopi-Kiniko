<!-- <div class="container">
    <div class="row ">
        <div class="col-md-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar pelanggan</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label>Re-Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="number" class="form-control" name="hp">
                        </div>
                        <button class="btn btn-primary" name="save">Daftar</button>

                        <a href="login.php" class="btn btn-primary">keluar</a>

                    </form>
                </div>


            </div>

        </div>

    </div>
</div> -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Buat Akun</li>
        </ol>
    </div>
</div>

<div class="register">
    <div class="container">
        <h2>Buat Akun</h2>
        <div class="login-form-grids">
            <h5>Isi Data Disini</h5>
            <form action="#" method="post">
                <input type="email" placeholder="Email Address" required=" " name="email">
                <input type="password" placeholder="Password" required=" " name="pass">
                <input type="password" placeholder="Password Confirmation" required=" " name="pass">
                <input type="text" placeholder="Nama Pelanggan..." required=" " name="nama"><br>
                <input type="text" placeholder="Nomor Telepon..." required=" " name="hp">
                <div class="register-check-box">
                    <div class="check">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>saya menerima syarat dan ketentuannya</label>
                    </div>
                </div>
                <input type="submit" value="Register" name="save">
            </form>
        </div>
        <div class="register-home">
            <a href="index.html">Home</a>
        </div>
    </div>
</div>

<?php
if (isset($_POST['save'])) {
    $email          =  $_POST['email'];
    $password       =  md5($_POST['pass']);
    $nama           =  $_POST['nama'];
    $hp             =  $_POST['hp'];

    $simpan = $koneksi->query("INSERT INTO tbl_pelanggan (pelanggan_email,
                   pelanggan_pass,
                   pelanggan_nama,
                   pelanggan_hp) VALUES('$email','$password','$nama','$hp')");


    if ($simpan == TRUE) {
        echo "<script>
                                    alert ('Data Berhasil Di Simpan')
                                    window.location= '?page=login'
                                    </script>";
    } else {
        echo "<script>
                                    alert ('Data Gagal Di Simpan')
                                    window.location= '?page=register'
                                </script>";
    }
}
?>
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Login</li>
        </ol>
    </div>
</div>

<div class="login">
    <div class="container">
        <h2>Login Form</h2>

        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <form method="POST">
                <input type="email" placeholder="Email Address" required=" " name="email">
                <input type="password" placeholder="Password" required=" " name="password">
                <input type="submit" value="Login" name="login">
            </form>
        </div>
        <h4>Tidak Punya Akun?</h4>
        <p><a href="?page=register">Buat Akun</a> (Atau) Kembali ke <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
    </div>
</div>

<?php
// jika ada tombol simpan(tombol simpan di tekan)
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    // lakukan kuery ngecek akun di tabel pelangan di db
    $ambil = $koneksi->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_email='$email' AND pelanggan_pass='$password'");
    //ngitung akun yang terambil
    $akunyangcocok = $ambil->num_rows;

    // jika 1 akun yang cocok , maka di loginkan
    if ($akunyangcocok == 1) {
        // anda sukses login
        // mendapatkan akun dlm bentuk aarray
        $akun = $ambil->fetch_assoc();
        //simpan di session pelanggan
        $_SESSION["pelanggan"] = $akun;
        echo "<script>alert('anda sukses login');</script>";
        echo "<script>location='?page=pages/produk/view';</script>";
    } else {

        // anda gagal login
        echo "<script>alert('anda gagal login, periksa akun anda');</script>";
        echo "<script>location='?page=login';</script>";
    }
}

?>
<?php
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('anda belum login (silahkan login dulu)');</script>";
    echo "<script>location='?page=login';</script>";
}
?>

<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">
                <a href="?page=pages/pemesan/view">Pemesanan</a>
            </li>
            <li class="active">
                CheckOut
            </li>
        </ol>
    </div>
</div>

<br>
<section class="konten">
    <div class="container">
        <h1>CheckOut Produk</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>

                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION["pemesan"] as $id_tenun => $jumlah) : ?>
                    <!-- menampilkan produk yg sedang diperulangkan berdasarkan id produk -->
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM tbl_produk WHERE produk_id='$id_tenun'");
                    $pecah = $ambil->fetch_assoc();
                    $Subharga = $pecah["produk_harga"] * $jumlah;
                    ?>

                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= $pecah["produk_nama"]; ?></td>
                        <td>Rp.<?= number_format($pecah["produk_harga"]); ?></td>
                        <td><?= $jumlah; ?></td>
                        <td>Rp.<?= number_format($Subharga); ?></td>

                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja += $Subharga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?= number_format($totalbelanja) ?></th>

                </tr>

            </tfoot>
        </table>

        <form method="post">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?= $_SESSION["pelanggan"]['pelanggan_nama'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?= $_SESSION["pelanggan"]['pelanggan_hp'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="ongkir_id">
                        <option value="">Pilih ongkos kirim</option>

                        <?php
                        $ambil = $koneksi->query("SELECT * FROM tbl_ongkir");
                        while ($perongkir = $ambil->fetch_assoc()) {

                        ?>
                            <option value="<?= $perongkir["ongkir_id"] ?>">
                                <?= $perongkir['ongkir_kota'] ?> -
                                Rp. <?= number_format($perongkir['ongkir_tarif']) ?>



                            </option>
                        <?php } ?>



                    </select>
                </div>



            </div>
            <div class="form-group">
                <label>Alamat Lengkap Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan Alamat Lengkap Pengiriman(beserta kode pos)"></textarea>



            </div>


            <button class="btn btn-primary" name="checkout">Checkout</button>


        </form>

        <?php
        if (isset($_POST["checkout"])) {
            $id_pelanggan       = $_SESSION["pelanggan"]["pelanggan_id"];
            $ongkir_id          = $_POST["ongkir_id"];
            $tanggal_pemesanan  = date("y-m-d");
            $alamat_pengirim    = $_POST['alamat_pengiriman'];


            $ambil = $koneksi->query("SELECT * FROM tbl_ongkir WHERE ongkir_id='$ongkir_id'");
            $arrayongkir = $ambil->fetch_assoc();
            $nama_kota = $arrayongkir['ongkir_kota'];
            $tarif = $arrayongkir['ongkir_tarif'];

            // if ($arrayongkir !== "") {
            //     $arrayongkir = uniqid() . '-' . $arrayongkir;
            // } else {
            //     echo "<script>
            //             alert('Masukan Alamat Terlebih Dahulu');
            //             window.location= '?page=pages/pemesan/checkout';
            //         </script>";
            //     die;
            // }


            $total_pemesanan = $totalbelanja + $tarif;

            // 1. menyimpan data ka tabel pemesanan
            $koneksi->query("INSERT INTO tbl_pemesanan(pelanggan_id,
            ongkir_id,
            pemesanan_tanggal,
            pemesanan_total,
            ongkir_kota,
            ongkir_tarif,
            alamat_pengirim)VALUES ('$id_pelanggan','$ongkir_id','$tanggal_pemesanan','$total_pemesanan','$nama_kota','$tarif','$alamat_pengirim') ");

            // mendapekan id pemesanan yang baru tajadi

            $id_pemesanan_barusan = $koneksi->insert_id;

            foreach ($_SESSION["pemesan"] as $id_tenun => $jumlah) {

                // mendapatkan data produk berdasarkan id_tenun
                $ambil = $koneksi->query("SELECT * FROM tbl_produk WHERE produk_id='$id_tenun'");
                $perproduk = $ambil->fetch_assoc();

                $nama = $perproduk['produk_nama'];
                $harga = $perproduk['produk_harga'];
                // $panjang = $perproduk['produk_panjang'];

                // $subpanjang = $perproduk['subpanjang'] * $jumlah;
                $subharga  = $perproduk['produk_harga'] * $jumlah;



                $koneksi->query("INSERT INTO tbl_pembelian(pemesanan_id,
                produk_id,
                produk_nama,
                produk_harga,
                sub_harga,
                jumlah)VALUES ('$id_pemesanan_barusan','$id_tenun','$nama','$harga','$subharga','$jumlah') ");

                //skrip update stokproduk
                $koneksi->query("UPDATE tbl_produk SET produk_stok=produk_stok -$jumlah
                  WHERE produk_id='$id_tenun'");


                // megirim email

                require 'PHPMailer/PHPMailerAutoload.php';
                $email_pengirim = "percobaanemail801@gmail.com";
                $isi = ('Terima kasih telah memesan produk kami,barang segera dikirim!');
                $subjek = ('Kopi Kiniko');
                $email_tujuan = $_SESSION["pelanggan"]['pelanggan_email'];

                $mail = new PHPMailer();

                $mail->IsHTML(true);    // set email format to HTML
                $mail->IsSMTP();   // we are going to use SMTP
                $mail->SMTPAuth   = true; // enabled SMTP authentication
                $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
                $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
                $mail->Port       = 465;                   // SMTP port to connect to GMail
                $mail->Username   = $email_pengirim;  // alamat email kamu
                $mail->Password   = "percobaan12";            // password GMail
                $mail->SetFrom($email_pengirim, 'kopikiniko');  //Siapa yg mengirim email
                $mail->Subject    = $subjek;
                $mail->Body       = $isi;
                $mail->AddAddress($email_tujuan);

                if (!$mail->Send()) {
                    echo "Eror: " . $mail->ErrorInfo;
                    exit;
                } else {
                    // echo "<div class='alert alert-success'><strong>Berhasil!</strong> Email telah berhasil dikirim.</div>";
                }
            }

            //mengkosongkan sesi pemesanan/ keranjang

            unset($_SESSION["pemesan"]);





            // tampilan di larian ka halaman nota , nota dari pembalian yang barusan
            echo "<script>alert('pemesanan sukses');</script>";
            echo "<script>location='?page=pages/pemesan/nota&id=$id_pemesanan_barusan';</script>";
        }

        ?>


    </div>


</section>
<br>
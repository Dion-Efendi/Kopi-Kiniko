<!-- <section class="content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-9 col-md-push-1">
                <div class="panel" style="background-color: #2b2a2a; color:white;">
                    <div class="panel-heading">
                        <strong>
                            <h2>Cara Pemesanan</h2>
                        </strong>
                        <h4>1. silahkan pilih menu produk dan kemudian pilih lah produk yang kami sediakan
                            <br>
                            <br> 2. setelah ada memilih produk kami silahkan tekan/klik tombol pesan <br>
                            <br> 3. dan kemudian ada akan di arahkan ke menu pemesanan<br>
                            <br> 4. silahkan ada baca dengan sangat teliti produk yang anda pesan<br>
                            <br> 5. jika anda sudah yakin dengan produk yang anda pilih silahkan tekan tombol checkout<br>
                            <br> 6. kemudian anda akah di arahkan ke menu login(silahkan masukan email dan password anda)<br>
                            <br> 7. jika anda bukan pelanggan tetap di rumah kopi kiniko silahkan anda melakukan pendaftaran
                            (dengan cara klik tombol daftar di menu login)<br>
                            <br> 8. jikan anda sudah login atau sudah mendaftar silahkan anda pilih ongkir dan isi alamat yang benar<br>
                            <br> 9. kemudian tekan checkout dan anda akan di arahkan ke nota pemesanan<br>
                            <br>10. kemudian silahkan anda cetak nota pemesanan dengan cara tekan tombol print warna hijau<br>
                            <br>
                            <CENTER><STRONG>(SEKIAN TERIMAH KASIH)</STRONG></CENTER>




                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="?page=home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Petunjuk Pesan</li>
        </ol>
    </div>
</div>

<div class="faq-w3agile">
    <div class="container">
        <h2 class="w3_agile_header">Langkah-Langkah Pemesanan</h2>
        <ul class="faq">
            <li class="item1">
                silahkan pilih menu produk dan kemudian pilih lah produk yang kami sediakan
            </li>
            <li class="item2">
                setelah ada memilih produk kami silahkan tekan/klik tombol pesan
            </li>
            <li class="item3">
                dan kemudian ada akan di arahkan ke menu pemesanan
            </li>
            <li class="item4">
                silahkan ada baca dengan sangat teliti produk yang anda pesan
            </li>
            <li class="item5">
                jika anda sudah yakin dengan produk yang anda pilih silahkan tekan tombol checkout
            </li>
            <li class="item6">
                kemudian anda akah di arahkan ke menu login(silahkan masukan email dan password anda)
            </li>
            <li class="item7">
                jika anda bukan pelanggan tetap di rumah kopi kiniko silahkan anda melakukan pendaftaran (dengan cara klik tombol daftar di menu login)
            </li>
            <li class="item8">
                jika anda sudah login atau sudah mendaftar silahkan anda pilih ongkir dan isi alamat yang benar
            </li>
            <li class="item9">
                kemudian tekan checkout dan anda akan di arahkan ke nota pemesanan
            </li>
            <li class="item10">
                kemudian silahkan anda cetak nota pemesanan dengan cara tekan tombol print warna hijau
            </li>
        </ul>
        <!-- script for tabs -->
        <script type="text/javascript">
            $(function() {

                var menu_ul = $('.faq > li > ul'),
                    menu_a = $('.faq > li > a');

                menu_ul.hide();

                menu_a.click(function(e) {
                    e.preventDefault();
                    if (!$(this).hasClass('active')) {
                        menu_a.removeClass('active');
                        menu_ul.filter(':visible').slideUp('normal');
                        $(this).addClass('active').next().stop(true, true).slideDown('normal');
                    } else {
                        $(this).removeClass('active');
                        $(this).next().stop(true, true).slideUp('normal');
                    }
                });

            });
        </script>
        <!-- script for tabs -->
    </div>
</div>
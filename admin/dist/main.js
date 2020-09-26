let a;
let getData = async () => {

    try {

        let path = window.location.href;
        console.log(path);
        let data = await axios('http://localhost/kopi_kiniko/admin/pages/laporan/kon/view.php');
        a = data.data;
        let c = [];

        let tgl = document.getElementById('tgl');

        tgl.addEventListener("change", () => {
            c = [];
            console.log(c)
            if (path == 'http://localhost/kopi_kiniko/admin/index.php?page=pages/laporan/index') {
                for (let i = 0; i < a.length - 1; i++) {
                    let param = a[i]['pemesanan_tanggal'].split('-')[1];
                    if (tgl.value == param) {
                        c.push(a[i]);
                    }

                }
            } else {
                for (let i = 0; i < a.length - 1; i++) {
                    let param = a[i]['pemesanan_tanggal'].split('-')[0];
                    if (tgl.value == param) {
                        c.push(a[i]);
                    }

                }
            }

            let isi = document.getElementById('isi');
            let ctx;

            if (c.length > 0) {
                c.forEach(b => {
                    ctx += `<tr id="asd" ><td>${b.pelanggan_id}</td><td>${b.pemesanan_tanggal}</td><td>${b.ongkir_kota}</td><td>${b.status}</td><td>${b.pemesanan_total}</td></tr>`
                });
                let g = Array.from(ctx);
                for (let i = 0; i <= 8; i++) {
                    g.shift();
                }
                g = g.join('')
                isi.innerHTML = g;
            } else {
                let g = `<tr><td colspan=5 class="text-center">Tidak Ada Data</td></tr>`
                isi.innerHTML = g;
            }


        })


    } catch (error) {
        throw error.message;
    }
}

getData();
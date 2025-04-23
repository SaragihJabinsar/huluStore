// Seleksi elemen yang dibutuhkan
const icon = document.querySelector('.fa-caret-left');
const accountLink = document.querySelector('.accountLink');

// Tambahkan event listener pada ikon
icon.addEventListener('click', () => {
    if (icon.style.marginLeft === '90px') {
        // Ubah ke posisi tertutup
        icon.style.marginLeft = '-10px';
        icon.style.transform = 'rotate(180deg)';
    } else {
        // Kembalikan ke posisi terbuka
        icon.style.marginLeft = '90px';
        icon.style.transform = 'rotate(0deg)';
    }
});

// Seleksi elemen huruf
const spans = document.querySelectorAll('.titleHeader span');

// Fungsi untuk mengatur animasi huruf
function animateText() {
    spans.forEach((span, index) => {
        // Tambahkan delay untuk setiap huruf
        setTimeout(() => {
            span.style.opacity = "1"; // Munculkan
            span.style.transform = "translateY(0)"; // Posisikan kembali
        }, index * 500); // 0.5s per huruf
    });

    // Sembunyikan kembali setelah 2 detik setelah semua huruf muncul
    setTimeout(() => {
        spans.forEach((span) => {
            span.style.opacity = "0";
            span.style.transform = "translateY(-20px)";
        });
    }, spans.length * 500 + 500); // Durasi total animasi + 2 detik
}

// Jalankan animasi secara berulang
setInterval(animateText, spans.length * 500 + 2500); // Total waktu animasi + jeda


// Pegawai
function togglePegawai(element) {
    element.classList.toggle('flipped');
}

// frmTambah
// Fungsi untuk menampilkan form tambah pegawai
function tampilkanFormTambah() {
    const formTambah = document.getElementById('formTambah');
    formTambah.style.display = 'block';
    formTambah.classList.remove('fade-out'); // Hapus animasi fade-out jika form ditampilkan
    formTambah.classList.add('fadeInUp'); // Tambahkan animasi fade-in
}

// Fungsi untuk menutup form
function tutupFormTambah() {
    const formTambah = document.getElementById('formTambah');
    formTambah.classList.add('fade-out');  // Menambahkan kelas fade-out
    setTimeout(function () {
        formTambah.style.display = 'none'; // Sembunyikan form setelah animasi selesai
    }, 300); // Waktu yang sama dengan durasi animasi fade-out
}

// Fungsi untuk menambahkan data pegawai ke dalam div tempatPegawai
function tambahPegawai(event) {
    event.preventDefault(); // Mencegah form dari reload halaman

    // Mengambil data dari form
    const nama = document.getElementById('nama').value;
    const jabatan = document.getElementById('jabatan').value;
    const jenisKelamin = document.getElementById('jenis_kelamin').value;
    const status = document.getElementById('status').value;
    const email = document.getElementById('email').value;
    const telepon = document.getElementById('telepon').value;
    const alamat = document.getElementById('alamat').value;

    // Membuat elemen pegawai baru
    const pegawaiBaru = document.createElement('div');
    pegawaiBaru.classList.add('pegawai');

    // Menambahkan konten HTML untuk pegawai baru
    pegawaiBaru.innerHTML = `
        <div class="front">
            <img src="../img/logo.png" alt="imgPegawai" class="img-fluid">
            <div class="deskripsiPegawai">
                <div class="iconPegawai d-flex justify-content-between py-1">
                    <i class="fa-solid fa-user-pen"></i>
                    <i class="fa-solid fa-user-minus"></i>
                </div>
                <div class="depanPegawai d-flex justify-content-center align-items-center flex-column">
                    <h3>${nama}</h3>
                    <h4>${jabatan}</h4>
                </div>
            </div>
        </div>
        <div class="back">
            <div class="infoPegawai">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Data Pegawai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>${nama}</td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>${jabatan}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>${jenisKelamin}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>${status}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>${email}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>${telepon}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>${alamat}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    `;

    // Tambahkan pegawai baru ke tempatPegawai
    const tempatPegawai = document.getElementById('tempatPegawai');
    tempatPegawai.appendChild(pegawaiBaru);

    // Tambahkan event klik untuk animasi flip pada pegawai baru
    pegawaiBaru.onclick = function () {
        pegawaiBaru.classList.toggle('flipped');
    }

    // Menambahkan animasi flip pada pegawai baru setelah ditambahkan
    setTimeout(() => {
        pegawaiBaru.classList.add('flipped');
    }, 100); // Delay sedikit untuk memastikan animasi bisa terlihat dengan baik

    // Menutup form setelah data ditambahkan
    tutupFormTambah();
}

// Produk
function toggleProduk(element) {
    element.classList.toggle('flipped');
}

// frmTambah
// Fungsi untuk menampilkan form tambah produk
function tampilkanFormTambahProduk() {
    const formTambah = document.getElementById('formProduk');
    formTambah.style.display = 'block';
    formTambah.classList.remove('fade-out'); // Hapus animasi fade-out jika form ditampilkan
    formTambah.classList.add('fadeInUp'); // Tambahkan animasi fade-in
}

// Fungsi untuk menutup form
function tutupFormTambahProduk() {
    const formTambah = document.getElementById('formProduk');
    formTambah.classList.add('fade-out');  // Menambahkan kelas fade-out
    setTimeout(function () {
        formTambah.style.display = 'none'; // Sembunyikan form setelah animasi selesai
    }, 300); // Waktu yang sama dengan durasi animasi fade-out
}

// Fungsi untuk menambahkan data produk ke dalam div tempatProduk
function tambahProduk(event) {
    event.preventDefault(); // Mencegah form dari reload halaman

    // Mengambil data dari form
    const namaProduk = document.getElementById('nama_produk').value;
    const kategori = document.getElementById('kategori').value;
    const harga = document.getElementById('harga').value;
    const stok = document.getElementById('stok').value;
    const deskripsi = document.getElementById('deskripsi').value;
    const gambar = document.getElementById('gambar').files[0]; // Mengambil file gambar

    // Membaca gambar jika ada
    const reader = new FileReader();
    reader.onload = function (e) {
        const gambarUrl = e.target.result;

        // Membuat elemen produk baru
        const produkBaru = document.createElement('div');
        produkBaru.classList.add('produk');

        // Menambahkan konten HTML untuk produk baru
        produkBaru.innerHTML = `
            <div class="front">
                <img src="${gambarUrl}" alt="imgProduk" class="img-fluid shadow-lg">
                <div class="deskripsiProduk">
                    <div class="iconProduk d-flex justify-content-between py-1">
                        <i class="fa-solid fa-edit"></i>
                        <i class="fa-solid fa-trash"></i>
                    </div>
                    <div class="depanProduk d-flex justify-content-center align-items-center flex-column position-relative">
                        <h3>${namaProduk}</h3>
                        <h4>Rp. ${harga}</h4>
                    </div>
                </div>
            </div>
            <div class="back">
                <div class="infoProduk">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">Data Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Nama</td><td>${namaProduk}</td></tr>
                            <tr><td>Kategori</td><td>${kategori}</td></tr>
                            <tr><td>Harga</td><td>Rp. ${harga}</td></tr>
                            <tr><td>Stok</td><td>${stok}</td></tr>
                            <tr><td>Deskripsi</td><td>${deskripsi}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        `;

        // Tambahkan produk baru ke tempatProduk
        const tempatProduk = document.getElementById('tempatProduk');
        tempatProduk.appendChild(produkBaru);

        // Tambahkan event klik untuk animasi flip pada produk baru
        produkBaru.onclick = function () {
            produkBaru.classList.toggle('flipped');
        }

        // Menambahkan animasi flip pada produk baru setelah ditambahkan
        setTimeout(() => {
            produkBaru.classList.add('flipped');
        }, 100); // Delay sedikit untuk memastikan animasi bisa terlihat dengan baik

        // Menutup form setelah data ditambahkan
        tutupFormTambah();
    };

    // Jika ada gambar, baca file
    if (gambar) {
        reader.readAsDataURL(gambar);
    } else {
        // Jika tidak ada gambar, langsung tampilkan produk tanpa gambar
        reader.onload = function () {
            const gambarUrl = "../img/default-product.jpg"; // URL gambar default
            const produkBaru = document.createElement('div');
            produkBaru.classList.add('produk');

            produkBaru.innerHTML = `
                <div class="front">
                    <img src="${gambarUrl}" alt="imgProduk" class="img-fluid shadow-lg">
                    <div class="deskripsiProduk">
                        <div class="iconProduk d-flex justify-content-between py-1">
                            <i class="fa-solid fa-edit"></i>
                            <i class="fa-solid fa-trash"></i>
                        </div>
                        <div class="depanProduk d-flex justify-content-center align-items-center flex-column position-relative">
                            <h3>${namaProduk}</h3>
                            <h4>Rp. ${harga}</h4>
                        </div>
                    </div>
                </div>
                <div class="back">
                    <div class="infoProduk">
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="2">Data Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Nama</td><td>${namaProduk}</td></tr>
                                <tr><td>Kategori</td><td>${kategori}</td></tr>
                                <tr><td>Harga</td><td>Rp. ${harga}</td></tr>
                                <tr><td>Stok</td><td>${stok}</td></tr>
                                <tr><td>Deskripsi</td><td>${deskripsi}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            `;

            // Tambahkan produk baru ke tempatProduk
            const tempatProduk = document.getElementById('tempatProduk');
            tempatProduk.appendChild(produkBaru);

            // Tambahkan event klik untuk animasi flip pada produk baru
            produkBaru.onclick = function () {
                produkBaru.classList.toggle('flipped');
            }

            // Menambahkan animasi flip pada produk baru setelah ditambahkan
            setTimeout(() => {
                produkBaru.classList.add('flipped');
            }, 100); // Delay sedikit untuk memastikan animasi bisa terlihat dengan baik

            // Menutup form setelah data ditambahkan
            tutupFormTambah();
        }
    }
}

// FrmEdit
function editPegawai(id, event) {
    event.stopPropagation(); // Menghentikan klik pada parent element
    window.location.href = `editPegawai.php?id=${id}`;
}


// Fungsi untuk hapus pegawai
function hapusPegawai(id) {
    document.getElementById('notifikasi').style.display = 'block';
    window.idToDelete = id; // Simpan id untuk konfirmasi hapus
}

// Fungsi untuk mengkonfirmasi penghapusan
function hapusPegawaiConfirm() {
    $.ajax({
        url: '../db/hapusPegawai.php',
        type: 'POST',
        data: { id: window.idToDelete },
        success: function (response) {
            if (response == 'success') {
                alert('Pegawai berhasil dihapus');
                location.reload();
            } else {
                alert('Gagal menghapus pegawai');
            }
        }
    });
}

// Fungsi untuk menutup notifikasi
function tutupNotifikasPegawai() {
    console.log('Notifikasi ditutup');
    document.getElementById('notifikasi').style.display = 'none';
}


// EditProduk
// Fungsi untuk edit produk
function editProduk(id, event) {
    event.stopPropagation(); // Menghentikan klik pada parent element
    window.location.href = `../db/editProduk.php?id=${id}`;
}

// Fungsi untuk mengkonfirmasi penghapusan
function hapusProdukConfirm() {
    console.log("Mengirim ID: " + window.idToDelete); // Debugging
    $.ajax({
        url: '../db/hapusProduk.php',
        type: 'POST',
        data: { id: window.idToDelete },
        success: function (response) {
            console.log(response); // Debugging response
            if (response == 'success') {
                alert('Produk berhasil dihapus');
                location.reload();
            } else {
                alert('Gagal menghapus produk');
            }
        }
    });
}

// Fungsi untuk hapus produk
function hapusProduk(id) {
    document.getElementById('notifikasiProduk').style.display = 'block';
    window.idToDelete = id; // Simpan id untuk konfirmasi hapus
}

// Fungsi untuk menutup notifikasiProduk
function tutupNotifikasi() {
    document.getElementById('notifikasiProduk').style.display = 'none';
}
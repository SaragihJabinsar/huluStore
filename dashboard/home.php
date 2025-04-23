<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grosir's Hulu | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>

    <?php
        session_start();
        // var_dump($_SESSION); // Debugging
        include '../db/koneksi.php';

        // Periksa apakah user sudah login
        if (!isset($_SESSION['nama'])) {
            header("Location: ../index.php"); // Arahkan ke login jika belum login
            exit();
        }

        $nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Pengguna';
    ?>

    <header class="d-flex flex-column justify-content-between align-items-center position-fixed">
        <div class="logoHeader position-relative">
            <img src="../img/logo.png" alt="logoHeader" class="img-fluid position-relative">
        </div>
        <nav class="my-5 d-flex flex-column justify-content-between h-100">
            <div class="titleHeader d-flex flex-column justify-content-center align-items-center fw-bold fs-5">
                <span>G</span>
                <span>R</span>
                <span>O</span>
                <span>S</span>
                <span>I</span>
                <span>R</span>
                <span>'</span>
                <span>S</span>
                <span>H</span>
                <span>U</span>
                <span>L</span>
                <span>U</span>
            </div>
            <div class="navAccount d-flex justify-content-around align-items-center me-2">
                <i class="fa-solid fa-caret-left me-4 mt-5"></i>
                <div class="accountLink d-flex flex-column justify-content-evenly align-items-center h-75 mb-3 mt-5">
                    <a href="#pegawai"><i class="fa-solid fa-users"></i></a>
                    <a href="#produk"><i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid section py-2 px-5">
        <div class="row d-flex justify-content-aroound align-items-center">
            <!-- Card -->
            <div class="col-6 mb-3" style="width: 50%;">
                <div class="row h-100 d-flex flex-column justify-content-around align-items-center me-5 ">
                    <!-- Bagian Atas -->
                    <div class="sectionOne col-12 px-3 pb-3 d-flex flex-column justify-content-between rounded-3"
                        style="height: 100%; margin: 50px 0 100px;">
                        <!-- Header Card -->
                        <div class="admin card-header text-center fw-bold p-1" style="margin-top: -25px;background-color: #6c757d;
    color: #f8f9fa;">
                            <?php echo htmlspecialchars($nama); ?>
                        </div>

                        <!-- Body Card -->
                        <div class="card-body" style="flex: 1; height: 200px;">
                            <h5 class="card-title my-3 pt-4" style="text-indent: 30px;">Kamu adalah CEO
                            </h5>
                            <p class="card-text">
                                'Memimpin dengan Visi,membangun dengan Aksi'
                            </p>
                            <img src="../img/face.png" alt="imgFace" class="position-relative"
                                style="height: 6rem; width: 8rem; right: -75%; top: 10%;">
                        </div>


                        <!-- Button Logout -->
                        <?php

                            // Jika tombol logout ditekan, hancurkan sesi dan redirect ke halaman login
                            if(isset($_GET['logout'])) {
                                session_destroy();
                                header("Location: ../index.php"); // Arahkan ke halaman login
                                exit();
                            }
                        ?>

                        <a href="?logout=true"
                            class="btn btn-primary align-self-start mt-3 d-flex align-items-center justify-content-center"
                            style="width: 100px; height: 40px; color:#d6d5d5;
">Logout</a>

                    </div>

                    <!-- Bagian Pegawai -->
                    <div class="col-12 mb-4 position-relative" style="cursor: pointer; top: -50px;">
                        <h2 class="my-3 fw-semibold fs-1 text-dark" style="color: #6c757d;">Pegawai</h2>

                        <div style="max-height: 200px; overflow-y: auto; border: 1px solid #ccc; border-radius: 8px;">
                            <table class="table table-striped"
                                style="width: 100%; border-collapse: collapse; text-align: center;">
                                <thead style="position: sticky; top: 0; background-color: #343a40; z-index: 1;">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            include '../db/koneksi.php'; // Pastikan file koneksi benar

                            $sql = "SELECT id, nama, jabatan, status FROM pegawai";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $statusClass = $row['status'] === 'Aktif' ? 'status-aktif' : 'status-tidak-aktif';
                                    echo "<tr>
                                            <td>{$row['id']}</td>
                                            <td>{$row['nama']}</td>
                                            <td>{$row['jabatan']}</td>
                                            <td class='$statusClass'>{$row['status']}</td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Tidak ada data pegawai.</td></tr>";
                            }
                        ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="imgSementara mt-5 ms-5">
                            <img src="../img/makananGrosir.png" alt="imgPegawai" class="img-fluid position-relative"
                                style="width: 20rem; height: 20rem; filter: drop-shadow(10px 10px 15px rgba(0, 0, 0,
                            0.5)); top: 150%; z-index: 1;">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Gambar -->
            <div class="col-6 pe-5 mb-3" style=" width: 50%;">
                <div class="row">
                    <div class="col-12">
                        <img src="../img/profilGrosir.jpg" alt="Image of Kirey"
                            class="img-fluid img-thumbnail rounded-3 shadow"
                            style="height: 100vh; object-fit: cover; position: relative; z-index: -1; width: 100%;">
                    </div>
                    <!-- Bagian Produk table-striped table-bordered -->
                    <div class="col-12 pt-4" style="cursor: pointer; z-index: 1;">
                        <h2 class="my-3 fw-semibold fs-1 text-end">Produk</h2>

                        <?php
        // Query untuk mengambil data produk
        $sql = "SELECT id, nama_produk, harga, stok FROM produk";
        $result = $conn->query($sql);
    ?>

                        <div class="table-responsive" style="max-height: 200px;">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    // Cek apakah ada data
                    if ($result->num_rows > 0) {
                        // Menampilkan data dalam tabel
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['id']) . "</td>
                                    <td>" . htmlspecialchars($row['nama_produk']) . "</td>
                                    <td>" . htmlspecialchars($row['harga']) . "</td>
                                    <td>" . htmlspecialchars($row['stok']) . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='4' class='text-center'>Tidak ada data produk</td>
                              </tr>";
                    }
                ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
        // Menutup koneksi
        $conn->close();
    ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Pegawai -->
    <div class="container-fluid" id="pegawai" style="border-top: 3px dotted black; margin-top: 400px;">
        <div class="row">
            <div class="col-12 p-5">
                <h1 class="text-center display-3 fw-bold">Pegawai</h1>
                <!-- Tombol untuk Menampilkan Form -->
                <button onclick="tampilkanFormTambah()">Tambah Pegawai</button>
                <!-- Form Tambah Pegawai -->
                <div id="formTambah" class="form-tambah" style="display: none;">
                    <form id="formTambahPegawai" onsubmit="tambahPegawai(event)" method="POST"
                        action="tambahPegawai.php">
                        <h3>Tambah Data Pegawai</h3>

                        <div class="form-row">
                            <div class="form-column">
                                <label for="nama">Nama:</label>
                                <input type="text" id="nama" name="nama" required>

                                <label for="jabatan">Jabatan:</label>
                                <input type="text" id="jabatan" name="jabatan" required>

                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>
                            </div>

                            <div class="form-column">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>

                                <label for="status">Status:</label>
                                <select id="status" name="status" required>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>

                                <label for="telepon">Telepon:</label>
                                <input type="text" id="telepon" name="telepon" required>

                                <label for="alamat">Alamat:</label>
                                <input type="text" id="alamat" name="alamat" required>
                            </div>
                        </div>

                        <button type="submit" name="simpan">Tambah Pegawai</button>
                        <button type="button" onclick="tutupFormTambah()">Batal</button>
                    </form>
                </div>

                <!-- Tempat Pegawai -->
                <div id="tempatPegawai"
                    class="tempatPegawai col-12 d-flex justify-content-evenly align-items-center p-3 position-relative mt-3">

                    <?php
include '../db/koneksi.php'; // Pastikan file koneksi sudah benar

$sql = "SELECT * FROM pegawai";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='pegawai mb-4' onclick='togglePegawai(this)' style='border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);'>
                <div class='front bg-lightblue p-3'>
                    <img src='../img/logo.png' alt='imgPegawai' class='img-fluid shadow-lg'>
                    <div class='deskripsiPegawai'>
                        <div class='iconPegawai d-flex justify-content-between'>
                            <a href='../db/editPegawai.php?id={$row['id']}' class='fa-solid fa-user-pen text-info'></a>
                            <i class='fa-solid fa-user-minus text-danger' onclick='hapusPegawai({$row['id']})'></i>
                        </div>
                        <div class='depanPegawai text-center'>
                            <h3>{$row['nama']}</h3>
                            <h4>{$row['jabatan']}</h4>
                        </div>
                    </div>
                </div>
                <div class='back bg-lightgray text-dark p-3'>
                    <div class='infoPegawai'>
                        <table class='table table-striped table-light'>
                            <thead>
                                <tr>
                                    <th colspan='2'>Data Pegawai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Nama</td><td>{$row['nama']}</td></tr>
                                <tr><td>Jabatan</td><td>{$row['jabatan']}</td></tr>
                                <tr><td>Jenis Kelamin</td><td>{$row['jenis_kelamin']}</td></tr>
                                <tr><td>Status</td><td>{$row['status']}</td></tr>
                                <tr><td>Email</td><td>{$row['email']}</td></tr>
                                <tr><td>Nomor Telepon</td><td>{$row['telepon']}</td></tr>
                                <tr><td>Alamat</td><td>{$row['alamat']}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>";
    }
} else {
    echo "<p class='text-warning'>Belum ada data pegawai. Klik tombol 'Tambah Pegawai' untuk menambahkan data.</p>";
}
?>



                </div>
                <!-- Notifikasi -->
                <div id="notifikasi" class="notifikasi mt-3" style="display:none;">
                    <div class="notifikasi-content">
                        <p>Apakah Anda yakin ingin menghapus pegawai ini?</p>
                        <button onclick="hapusPegawaiConfirm()">Ya</button>
                        <button onclick="tutupNotifikasPegawai()">Tidak</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Produk -->
    <div class="container-fluid" id="produk" style="border-top: 3px dotted black;">
        <div class="row">
            <div class="col-12 p-5">
                <h1 class="text-center display-3 fw-bold">Produk</h1>
                <!-- Tombol untuk Menampilkan Form -->
                <button onclick="tampilkanFormTambahProduk()">Tambah Produk</button>
                <!-- Form Tambah Produk -->
                <div id="formProduk" class="form-tambah" style="display: none;">
                    <form id="formTambahProduk" onsubmit="tambahProduk(event)" method="POST" action="tambahProduk.php"
                        enctype="multipart/form-data">
                        <h3>Tambah Data Produk</h3>

                        <div class="form-row">
                            <div class="form-column">
                                <label for="nama_produk">Nama Produk:</label>
                                <input type="text" id="nama_produk" name="nama_produk" required>

                                <label for="kategori">Kategori:</label>
                                <input type="text" id="kategori" name="kategori" required>

                                <label for="harga">Harga:</label>
                                <input type="number" id="harga" name="harga" required>
                            </div>

                            <div class="form-column">
                                <label for="stok">Stok:</label>
                                <input type="number" id="stok" name="stok" required>

                                <label for="gambar">Gambar Produk:</label>
                                <input type="file" id="gambar" name="gambar" accept="image/*" required>

                                <label for="deskripsi">Deskripsi:</label>
                                <textarea id="deskripsi" name="deskripsi" required></textarea>
                            </div>
                        </div>

                        <button type="submit" name="simpan">Tambah Produk</button>
                        <button type="button" onclick="tutupFormTambahProduk()">Batal</button>
                    </form>
                </div>

                <!-- Tempat Produk -->
                <div id="tempatProduk"
                    class="tempatProduk col-12 d-flex justify-content-evenly align-items-center p-3 position-relative mt-3">
                    <?php
                        include '../db/koneksi.php'; // Pastikan file koneksi sudah benar

                        $sql = "SELECT * FROM produk";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Tampilkan setiap produk dalam sebuah div
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='produk' onclick='toggleProduk(this)' style='border-radius: 8px; margin-bottom: 20px; padding: 10px; transition: transform 0.3s; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);'>
                                        <div class='front'>
                                            <img src='../img/logo.png' alt='imgProduk' class='img-fluid shadow-lg' style='border-radius: 8px;'>
                                            <div class='deskripsiProduk' style='background-color:rgba(216, 209, 209, 0.86); border-radius: 8px; padding: 10px;'>
                                                <div class='iconProduk d-flex justify-content-between py-1'>
                                                    <a href='../db/editProduk.php?id={$row['id']}' class='fa-solid fa-edit edit-icon' style='color: #007bff;'></a>
                                                    <i class='fa-solid fa-trash' onclick='hapusProduk({$row['id']})' style='color: #e74c3c;'></i>
                                                </div>
                                                <div class='depanProduk d-flex justify-content-center align-items-center flex-column position-relative '>
                                                    <h3 style='font-size: 1.2rem; font-weight: bold; color: #333;'>{$row['nama_produk']}</h3>
                                                    <h4 style='color: #28a745;'>Rp. {$row['harga']}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='back'>
                                            <div class='infoProduk'>
                                                <table style='width: 100%;'>
                                                    <thead>
                                                        <tr style='background-color: #f1f1f1;'>
                                                            <th colspan='2' style='text-align: center; padding: 10px;'>Data Produk</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan='2' style='text-align: center; padding: 10px;'>
                                                                <img src='../img/Produk/{$row['gambar']}' alt='{$row['nama_produk']}' style='width: 100px; height: 100px; object-fit: cover; border-radius: 5px;' class='img-fluid'>
                                                            </td>
                                                        </tr>
                                                        <tr><td style='padding: 8px;'>Nama</td><td style='padding: 8px;'>{$row['nama_produk']}</td></tr>
                                                        <tr><td style='padding: 8px;'>Kategori</td><td style='padding: 8px;'>{$row['kategori']}</td></tr>
                                                        <tr><td style='padding: 8px;'>Harga</td><td style='padding: 8px;'>Rp. {$row['harga']}</td></tr>
                                                        <tr><td style='padding: 8px;'>Stok</td><td style='padding: 8px;'>{$row['stok']}</td></tr>
                                                        <tr><td style='padding: 8px;'>Deskripsi</td><td style='padding: 8px;'>{$row['deskripsi']}</td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>";
                            }
                        } else {
                            echo "<p>Belum ada data produk. Klik tombol 'Tambah Produk' untuk menambahkan data.</p>";
                        }
                    ?>

                </div>
                <!-- Notifikasi -->
                <div id="notifikasiProduk" class="notifikasi mt-3" style="display:none;">
                    <div class="notifikasi-content">
                        <p>Apakah Anda yakin ingin menghapus produk ini?</p>
                        <button onclick="hapusProdukConfirm()">Ya</button>
                        <button onclick="tutupNotifikasi()">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h5>Grosir's Hulu</h5>
                    <p>Platform yang menyediakan berbagai produk grosir dengan harga terbaik, untuk kebutuhan bisnis
                        Anda.</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Produk</a></li>
                        <li><a href="#" class="text-white">Tentang Kami</a></li>
                        <li><a href="#" class="text-white">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12">
                    <h5>Hubungi Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-phone"></i> +62 123 456 789</li>
                        <li><i class="fa-solid fa-envelope"></i> info@grosirshulu.com</li>
                        <li><i class="fa-solid fa-location-pin"></i> Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>&copy; 2024 Grosir's Hulu. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/home.js"></script>
</body>

</html>
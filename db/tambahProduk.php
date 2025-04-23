<?php
// Include koneksi database
include 'koneksi.php';

// Ambil data dari form
if (isset($_POST['simpan'])) {
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $target = '../img/Produk' . basename($gambar);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $insert = mysqli_query($koneksi, "INSERT INTO produk (nama_produk, kategori, harga, stok, gambar, deskripsi) 
        VALUES ('$nama_produk', '$kategori', '$harga', '$stok', '$gambar', '$deskripsi')") or die(mysqli_error($koneksi));
    } else {
        echo "Gagal mengupload gambar.";
    }
}
?>
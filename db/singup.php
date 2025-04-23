<?php
// Penyimpanan nilai/value pada variabel baru berdasarkan name pada form
$nama = $_POST['nama'];
$gmail = $_POST['gmail'];
$password = $_POST['password'];

// Menghubungkan ke tabel yang dituju
include "koneksi.php";

// Simpan data ke tabel `akun`
mysqli_query($conn, "INSERT INTO akun(nama,gmail, password) VALUES ('$nama','$gmail', '$password')");

// Tampilkan pesan sukses
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Success</title>
    <link rel="stylesheet" href="../css/singup.css">
</head>

<body>
    <div class="success-box">
        <h1>Signin Berhasil!</h1>
        <div class="container">
            <div class="circle"></div>
            <div class="check">&#10004;</div> <!-- Simbol centang -->
            <div class="circleTwo"></div>
        </div>
        <p>Selamat, akun Anda telah berhasil didaftarkan.</p>
        <button onclick="window.location.href='../index.php';">Login Sekarang</button>
    </div>
</body>

</html>
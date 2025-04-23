<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $nama = $_POST['nama'];
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    // Validasi input kosong
    if (empty($nama) || empty($gmail) || empty($password)) {
        echo '<script>alert("Semua kolom harus diisi!");</script>';
        header("Location: ../index.php");
        exit();
    }

    // Siapkan query
    $stmt = $conn->prepare("SELECT * FROM akun WHERE gmail = ? AND password = ?");
    $stmt->bind_param("ss", $gmail, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah ada data yang cocok
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Ambil data dari hasil query
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['gmail'] = $row['gmail'];
        header("Location: ../dashboard/home.php"); // Redirect ke halaman home
        exit();
    } else {
        echo '<script>alert("Login Gagal! Email atau Password salah.");</script>';
        header("Location: ../index.php");
        exit();
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
}
?>
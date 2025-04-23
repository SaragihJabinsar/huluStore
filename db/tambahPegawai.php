<?php
// Include koneksi database
include 'koneksi.php';

// Ambil data dari form
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // Query SQL
    $insert = mysqli_query($koneksi, "INSERT INTO pegawai (nama, jabatan, jenis_kelamin, status, email, telepon, alamat) VALUES(
        '$nama','$jabatan','$jenis_kelamin','$status','$email','$telepon','$alamat'
    )") or die(mysqli_error($koneksi));

    if ($insert) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Gagal menyimpan data.";
    }
}
?>